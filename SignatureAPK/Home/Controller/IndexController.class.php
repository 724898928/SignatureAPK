<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class IndexController extends Controller {
    
	public function index(){
	   // $name="李欣";
	 //   $this->assign("data",$name);
	    
	   
	  //  $data['verify']=$Verify;
       // $this->assign('$data',$data);
     	$this->display();
	 }

	 public function Verify(){
	     $config = array(
	         'fontSize'=> 20,//验证字体大小
	         'length' => 4,//验证码位数
	         'imageH'=>40,//验证码高度
	         'imageW'=>140,//验证码宽度
	         //'useImgBg'=>false,// 开启验证码背景图片功能
	         'useNoise'=>false,// 关闭验证码杂点
	     );
	     $Verify=new Verify($config);
	     $Verify->entry();
	 }
	 
}