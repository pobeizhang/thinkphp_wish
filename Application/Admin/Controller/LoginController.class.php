<?php namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;
class LoginController extends Controller
{
	//登录页面
	public function login()
	{
		$this->display();
	}

	//登录验证
	public function login_verify()
	{
		//如果不是表单提交而是人为在地址栏输入地址试图跳过表单，则重定向到登录页面
		if(!IS_POST) $this->redirect('Admin/Login/login');
		$verify=I('post.verify');
		//判断验证码
		if(!$this->check_verify($verify)) $this->error('验证码错误',U('Admin/Login/login'));

		$user=M('user')->where(array('username'=>I('username')))->find();
		if(!$user || $user['pwd']!=I('post.password','','md5')) $this->error('用户名或密码错误');
		//判断是否锁定
		if($user['locked']) $this->error('用户被锁定,请联系管理员申请解锁...');
		$data=array(
			'id'=>$user['id'],
			'logintime'=>time(),
			'loginip'=>get_client_ip(),
			);
		M('user')->save($data);
		session(C('USER_AUTH_KEY'),$user['id']);
		session('username',$user['username']);
		session('logintime',date('Y-m-d H:i:s',$data['logintime']));
		session('loginip',$date['loginip']);
		
		if (session('username')==C('RBAC_SUPERADMIN')) {
			session(C('ADMIN_AUTH_KEY'),true);
		}

		Rbac::saveAccessList();
		// p($_SESSION);
		// die;
		$this->redirect('Admin/Index/index');
	}

	//验证码
	public function verify()
	{
		$config = array(
			'fontSize' => 22, // 验证码字体大小
			'length' => 4, // 验证码位数
			'useNoise' => false, // 关闭验证码杂点
			'useImgBg' => true
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

	// 检测输入的验证码是否正确， $code为用户输入的验证码字符串
	private function check_verify($code, $id = '')
	{
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}

	//退出登录
	public function loginout()
	{
		session_unset();
		session_destroy();
		$this->redirect('Admin/Login/login');
	}
}