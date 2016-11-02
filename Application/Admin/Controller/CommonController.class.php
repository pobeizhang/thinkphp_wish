<?php namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller
{
	public function _initialize()
	{
		if(!isset($_SESSION[C('USER_AUTH_KEY')])){
			$this->redirect('Admin/Login/login');
		}

		if(C('USER_AUTH_ON')){
			$rbac=new \Org\Util\Rbac();
			$rbac::AccessDecision() || $this->error('没有权限','index.php');
		}
	}
}