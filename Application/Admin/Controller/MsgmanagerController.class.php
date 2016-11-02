<?php namespace Admin\Controller;
use Admin\Controller\CommonController;
class MsgmanagerController extends CommonController
{
	public function index()
	{
		$wish=M('wish');
		$count=$wish->count();
		$page=new \Think\Page($count,9);

		$page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
	    $page->setConfig('prev', '上一页');
	    $page->setConfig('next', '下一页');
	    $page->setConfig('last', '末页');
	    $page->setConfig('first', '首页');
	    $page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
	    $page->lastSuffix = false;//最后一页不显示为总页数

		$list=$wish->order('time DESC')->limit($page->firstRow.','.$page->listRows)->select();
		$show=$page->show();
		$this->assign('page',$show);
		$this->assign('data',$list);
		$this->display();
	}

	// 删除帖子
	public function delete()
	{
		$id=array(
			'id'=>I('get.id')
			);
		$res=M('wish')->where($id)->delete();
		if($res){
			$this->success('帖子删除成功');
		}else{
			$this->error('帖子删除失败');
		}
	}
}