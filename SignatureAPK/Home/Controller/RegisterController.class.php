<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    
  
	private function register(){
	// echo "register";
	$this->display();
	 }
/* 
 * 判断是否注册成功，并重定向到登陆页面
 *  */
	private function  registeredJudge(){
	  
	    if ($this->registerUser()){
	        echo "";
	        $this->redirect('Index/index',"",2,"<h1>Register success! </h1>");
	    }else {
	        $this->error('Register fail!');
	    }
	}
	 
/*
 *   注册用户信息的方法
 *   */
	private function registerUser(){
	    $data['username']=$_POST['username'];
	    $data['passwd']=$_POST['password'];
	    $data['email']=$_POST['email'];
	    $data['firstname']=$_POST['firstname'];
	    $data['lastname']=$_POST['lastname'];
	    $data['companyname']=$_POST['companyname'];
	    
	     $user = M('userinf');
	     $user->data($data)->add();
	    // dump($user);
	    if ($user) {
	       return true ;
	    }else {
	        return false;
	    }
	}
}