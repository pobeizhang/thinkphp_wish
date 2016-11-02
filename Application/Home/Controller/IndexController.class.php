<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller 
{
    public function index()
    {	
    	$wishes=M('wish')->select();
    	foreach ($wishes as $key => $value) {
    		$wishes[$key]['content']=phiz_replace($value['content']);
    	}
    	$this->assign('wishes',$wishes);
    	$this->display();
    }

    //处理许愿的表单
    public function handle()
    {
    	$data=[
    		'username'=>I('post.username'),
    		'content'=>I('post.content'),
    		'time'=>time()
    	];
    	if($id=M('wish')->data($data)->add()){
    		$data['content']=phiz_replace($data['content']);
    		$data['id']=$id;
			$data['time']=date('Y-m-d H:i',$data['time']);
			$data['status']=1;
			$this->ajaxReturn($data,'json');    		
    	}else{
    		$this->ajaxReturn(array('status'=>0),'json');
    	}
    }

    //异步删除许愿条
    public function delWish(){
    	$num=I('post.num');
    	$num=ltrim($num,'No.');
    	if(M('wish')->where('id='.$num)->delete()){
    		$this->ajaxReturn(array('status'=>1),'json');
    	}else{
    		$this->ajaxReturn(array('status'=>0),'json');
    	}
    }
}
