<?php
namespace Home\Controller;

use Think\Controller;
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
        if($this->check_username()){
            $this->display();
        } else {
            $this->error("用户不存在！");
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
        session(array('name'=>'session_id','expire'=>3600));
        if ($this->checkverify($code, '')) {
            $this->error("验证码错误！");
            break;
        }
       // dump($name);
     //   dump($password);
        $User = M('userinf');
       // $re = $User->where('username='.$name)->select();
        //dump($re);
        $i = $User->where('username="'.$name.'" and passwd="'.$password.'"')->select();
        $companyname =$i[0]['companyname'];
        dump($i);
        if ($i>0) {
            session('name',$name);
            session('password',$password);
            session('code',$code);
            session('companyname',$companyname);
           // dump(session('code'));
            $filepath = $_SERVER['DOCUMENT_ROOT']."/".$companyname."/";
            if(!is_dir($filepath)){
                mkdir($filepath);
                chmod($filepath,0777);
                session('filepath',$filepath);
            }
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
    
    /*
     * 执行签名
     *
     **/
    public function  pushtoserver(){
       // $uplandfile=$_POST['uplandfile'];
       // $Pushkeystore=$_POST['Pushkeystore'];
        
       $name = session('name');
       $password= session('password');
       $code = session('code');
          
       $companyname =  session('companyname');
       $filepath =session('filepath');
      
        //echo "文件临时存储的位置: ".$_FILES['uplandfile']['tmp_name']."<br>";
        $uplandfile =  $_FILES["uplandfile"] ;
        $keystore = $_FILES["Pushkeystore"] ;
        //echo  $uplandfile."<br>".$keystore."<br>";
        //print_r($uplandfile);
        $temp = explode(".",$_FILES["uplandfile"]["name"]);//通过“.”分割成段。
        $extension = end($temp);//输出数组最后一个元素.获取后缀名
        if($_FILES['uplandfile']['error']=="0"){
            if($extension=="apk"){
                if(file_exists($filepath.$_FILES["uplandfile"]["name"])){//判断文件是否存在
                   // echo "<h1>".$_FILES["uplandfile"]["name"]." be exist!</h1><br>";
                  //  redirect("Start/start");
                 $this->error("<h1>".$_FILES["uplandfile"]["name"]." be exist!</h1><br>");
                }else{
        
                    if(move_uploaded_file($_FILES["uplandfile"]["tmp_name"], $filepath.$_FILES["uplandfile"]["name"])){
                  $this->success("<h1>Apk Push to server successfully !</h1>");
                      //  echo "<h1>Apk Push to server successfully !</h1>";
                    }else{
                        $this->error("<h1>upload APK fail!</h1>");
                      //  echo "<h1>upload APK fail!</h1>";
                    }
                }
            }else{
              //  echo  "<h1>Format of APK error!</h1>";
                $this->error("<h1>Format of APK error!</h1>");
            }
        }else{
            //echo "<h1>Apk can not be empty! please upload Apk! </h1>";
            $this->error("<h1>Apk can not be empty! please upload Apk! </h1>");
        }
        
        if($_FILES['uplandfile']['error']=="0"){
            if(file_exists($filepath.$keystore["name"])){
                $this->error("<h1>".$keystore["name"]." be exist!</h1><br>");
               // echo "<h1>".$keystore["name"]." be exist!</h1><br>";
            }else{
        
                if(move_uploaded_file($keystore["tmp_name"], $filepath.$keystore["name"])){
        
                    $_SESSION["temp"]= array( $uplandfile["name"],$keystore["name"]);	//$_FILES['myFile']['name'] 客户端文件的原名称。
                    $this->success("<h1>Keystore Push to server successfully !</h1>");
                 //   echo "<h1>Keystore Push to server successfully !</h1>";
                }else{
                    $this->error("<h1>Push to server fail!</h1>");
                  //  echo "<h1>Push to server fail!</h1>";
                }
            }
        }else{
          //  echo "<h1>keystore can not be empty! please upload keystore! </h1>";
            $this->error("<h1>keystore can not be empty! please upload keystore! </h1>");
        }
        
      // echo "pushtoserver()";
   //   $this->start();
    }
    
    public function startSignature(){
        $keystorepass=$_POST["keystorepass"];
        $aliasName = $_POST["aliasName"];
        $filepath = $_SESSION["conf"][3];
        $rootpath = $_SESSION["conf"][4];
        @$apkname = $_SESSION["temp"][0];
        @$keystore = $_SESSION["temp"][1];
        $companyname = $_SESSION["conf"][2];
        $suess = "no";
        $status =  $_SESSION["conf"][5];
        echo $keystorepass."<br>";
        echo $aliasName."<br>";
        $insert ="insert into addinf (companyname,keystorepass,aliasName,keystore)values('$companyname','$keystorepass','$aliasName','$keystore');";
        
        
        if(empty($rekey)){
            $query2=mysql_query($insert);
            $result2 = @mysql_fetch_array($query2);
        
            if(empty($keystorepass)||empty( $aliasName)){
                echo "<h1>keystorePassword ro aliasName can not be empty</h1>";
            }else{
        
                if(!empty($apkname)||!empty($keystore)){
                    signature($filepath,$apkname,$keystore,$aliasName,$suess,$keystorepass);
        
                }else{
                    echo "<h1> apk ro keystore can not exist !Please upload！</h1>";
                }
        
            }
        
        }else{
        
            signature($filepath,$apkname,$keystore,$result['aliasName'],$suess,$result['keystorepass']);
            //echo $result['keystorepass']."<br>" ;
            //echo $result['aliasName']."<br>" ;
            //echo $result['keystore']."<br>" ;
        
        }
        signature($filepath,$apkname,$keystore,$aliasName,$suess,$keystorepass);
        
    }
    
   private function signature($filepath,$apkname,$keystore,$aliasName,$suess,$keystorepass){
    
        if(file_exists($filepath.$apkname) && file_exists($filepath.$keystore)){//判断文件是否存在
            //$decod =json_decode($json);
            // echo $json;
            //  $file = fopen($_SERVER['DOCUMENT_ROOT']."/data.php",'w+');
            //fwrite($file, $json);
            //fclose($file);
             
            mkdir($filepath."test/");
            chmod($filepath."test/",0777);
            $sudounzip = system("unzip ".$filepath.$apkname." -d ".$filepath."test");
            $test=$filepath."test";
            $removeMeta = system("rm -rf ".$test."/META-INF");
            $zipapk = system("cd ".$filepath."test/ && zip -q -r sigalg_".$apkname." ./*");
            $removeapp=system("cd ".$filepath."test/ && mv sigalg_".$apkname." ".$filepath."sigalg_".$apkname);
            $remvtest=system("rm -rf ".$test);
            $rmsigalg = system("rm -rf ".$filepath.$apkname);
            $result = system("jarsigner -verbose -keystore ".$filepath.$keystore." -storepass ".$keystorepass." -signedjar ".$filepath."signed_".$apkname." -digestalg SHA1 -sigalg MD5withRSA ".$filepath."sigalg_".$apkname." ".$aliasName);
            $rmsigalg = system("rm -rf ".$filepath."sigalg_".$apkname."&& echo 1");
            $rename=system("cd ".$filepath." && mv signed_".$apkname." ".$filepath.$apkname."&& echo 1");
    
            if($rename){
                echo "<h1>SignatureAPK succeed！</h1>";
                $suess = "y";
    
            }else{
                echo "<h1>SignatureAPK fail！</h1>";
                $suess = "no";
            }
            //echo  $rmsigalg."<br>";
        }else{
    
            echo "<h1> apk ro keystore can not exist !</h1>";
        }
        //echo $suess."llllllll";
        $_SESSION["keyname"]= array($keystorepass,$aliasName,$suess);
    }
}
