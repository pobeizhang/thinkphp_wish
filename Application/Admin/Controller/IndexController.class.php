<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class IndexController extends CommonController
{
    public function index()
    {
        $this->display();
    }

    //欢迎界面
    public function welcome()
    {
    	$this->assign('apache_get_version',apache_get_version());
    	$this->display();
    }
}