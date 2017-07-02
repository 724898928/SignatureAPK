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
        $this->display();
    }

    /*
     * 验证用户信息
     * @param
     *
     */
    function check_username()
    {
        $data['name'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $User = new Model($dbname);
        $result = $User->where('username =' . $data['name'])->find();
        
        echo $result . "<br>";
        dump(! $result);
        echo $data['name'] . "<br>" . $data['password'];
        if ($result) {
            dump(! $result);
            $this->start();
        } else {
            $index = new IndexController();
            echo $index->index();
        }
    }

    /*
     * 验证验证码是否正确
     * @param string $code 为用户输入的字符串
     * @param string $id 验证码标识
     */
    function checkverify($code, $id = '')
    {
        $verify = new Verify();
        return $verify->check($code, $id);
    }
}
