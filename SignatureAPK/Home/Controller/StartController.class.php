<?php
namespace Home\Controller;

use Think\Controller;
use Think\Model;
use Think\Verify;

class StartController extends Controller
{

    public function start()
    {
        $dbname = "config";
        $table1 = "addinf";
        $table2 = "userinf";
        $creatdb = "create database " . $dbname;
        $createtable1 = "CREATE TABLE addinf(
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
companyname varchar(50),
keystorepass varchar(50),
aliasName varchar(50),
keystore varchar(50)
)";
        $createtable2 = "CREATE TABLE userinf (
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
username varchar(50),
password varchar(50),
status int(15),
email varchar(50),
firstname varchar(50),
lastname varchar(50),
companyname varchar(50)
)";
        // echo $this->check_username();
        if ($this->check_username()) {
            $this->display();
        } else {
           // $this->error("用户不存在！");
        }
    }

    /*
     * 验证用户信息
     * @param
     *
     */
    function check_username()
    {
        $name = $_POST['username'];
        $password = $_POST['password'];
        $code = $_POST['code'];
        
        if ($this->checkverify($code, '')) {
            $this->error("验证码错误！");
        }
        dump($name);
        dump($password);
        $User = M('userinf');
       // $re = $User->where('username='.$name)->select();
        //dump($re);
        $i = $User->where('username="'.$name.'" and passwd="'.$password.'"')->count();
        dump($i);
        if ($i>0) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * 验证验证码是否正确
     * @param string $code 为用户输入的字符串
     * @param string $id 验证码标识 与 Index->Verify()->entry(1);中的“1”对应
     */
    function checkverify($code, $id = '1')
    {
        $verify = new Verify();
        return $verify->check($code, $id);
    }
}
