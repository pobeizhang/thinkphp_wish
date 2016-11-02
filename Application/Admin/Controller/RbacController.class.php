<?php namespace Admin\Controller;
use Admin\Controller\CommonController;
class RbacController extends CommonController
{
	//用户列表
	public function index()
	{
		$users=D('UserRelation')->field('pwd',true)->relation(true)->select();
		$this->assign('users',$users);
		$this->display();
	}

	//角色列表
	public function role()
	{
		$data=M('role')->select();
		$this->assign('data',$data);
		$this->display();
	}

	//节点列表
	public function node()
	{
		$field=array('id','name','title','pid');
		$node=M('node')->field($field)->order('sort')->select();
		$node=node_merge($node);
		$this->assign('node',$node);
		$this->display();
	}

	//添加用户
	public function addUser()
	{
		$role=M('role')->select();
		$this->assign('role',$role);
		$this->display();
	}

	//添加用户表单处理
	public function addUserHandle()
	{
		//用户信息
		$user=array(
			'username'=>I('post.username'),
			'pwd'=>I('post.pwd','','md5'),
			'logintime'=>time(),
			'loginip'=>get_client_ip()
			);
		//所属角色
		$role=array();
		if($uid=M('user')->add($user)){
			foreach ($_POST['role_id'] as $v) {
				$role[]=array(
					'role_id'=>$v,
					'user_id'=>$uid
					);
			}
			//添加角色
			M('role_user')->addAll($role);
			$this->success('添加成功',U('Admin/Rbac/index'));
		}else{
			$this->error('添加失败');
		}
	}

	//添加角色
	public function addRole()
	{
		$this->display();
	}

	//添加角色表单处理
	public function addRoleHandle()
	{
		$res=M('role')->add(I('post.'));
		if($res){
			$this->success('角色添加成功',U('Admin/Rbac/role'));
		}else{
			$this->error('角色添加失败');
		}
	}

	//添加节点
	public function addNode()
	{
		$pid=I('get.pid',0,'intval');
		$level=I('get.level',1,'intval');
		$this->assign('pid',$pid);
		$this->assign('level',$level);
		switch ($level) {
			case 1:
				$this->assign('type','应用');
				break;
			
			case 2:
				$this->assign('type','控制器');
				break;

			case 3:
				$this->assign('type','动作方法');
				break;
		}
		$this->display();
	}
	
	//添加节点
	public function addNodeHandle()
	{
		$res=M('node')->add(I('post.'));
		if($res){
			$this->success('添加成功',U('Admin/Rbac/node'));
		}else{
			$this->error('添加失败');
		}
	}

	//配置权限
	public function access()
	{
		$rid=I('get.rid',0,'intval');
		$node=M('node')->order('sort')->select();

		//原有权限
		$access=M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
		$node=node_merge($node,$access);
		$this->assign('rid',$rid);
		$this->assign('node',$node);
		$this->display();
	}

	//修改权限
	public function setAccess()
	{
		$rid=I('post.rid',0,'intval');
		$access=M('access');
		//删除原权限
		$access->where(array('role_id'=>$rid))->delete();
		//组合权限信息
		$data=array();
		foreach ($_POST['access'] as $v) {
			$tem=explode('_', $v);
			$data[]=array(
				'role_id'=>$rid,
				'node_id'=>$tem[0],
				'level'=>$tem[1]
				);
		}
		//插入新权限
		if($access->addAll($data)){
			$this->success('修改成功',U('Admin/Rbac/role'));
		}else{
			$this->error('修改失败');
		}
	}

	//锁定用户
	public function lockUser()
	{
		$id=I('get.id','','intval');
		$res=M('user')->where(array('id'=>$id))->save(array('locked'=>1));
		if($res){
			$this->success('用户成功锁定',U('Admin/Rbac/index'));
		}else{
			$this->error('用户锁定失败');
		}
	}

	//解锁用户
	public function UnLockUser()
	{
		$id=I('get.id','','intval');
		$res=M('User')->where(array('id'=>$id))->save(array('locked'=>0));
		if($res){
			$this->success('用户解锁成功',U('Admin/Rbac/index'));
		}else{
			$this->error('用户解锁失败');
		}
	}
}