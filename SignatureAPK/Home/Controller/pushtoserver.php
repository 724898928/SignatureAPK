<?php
    session_start();
	$username = $_SESSION["conf"][0];
	$password = $_SESSION["conf"][1];
	$companyname = $_SESSION["conf"][2];
    //  echo $companyname;	
	$filepath = $_SESSION["conf"][3];
	$status =  $_SESSION["conf"][5];



	//echo "文件临时存储的位置: ".$_FILES['uplandfile']['tmp_name']."<br>";													
  $uplandfile =  $_FILES["uplandfile"] ;
  $keystore=$_FILES["Pushkeystore"] ;
	//echo  $uplandfile."<br>".$keystore."<br>";
	//print_r($uplandfile);
  $temp = explode(".",$_FILES["uplandfile"]["name"]);//通过“.”分割成段。
  
   
 //   echo $_FILES["uplandfile"]["name"]."<br>";
  //   print_r($_FILES["uplandfile"]); 
 // echo $temp[1]."<br>";
  $extension = end($temp);//输出数组最后一个元素.获取后缀名
 // echo $extension."<br>";
	//if(!empty($uplandfile[0])||!empty($keystore[0])){
      if($_FILES['uplandfile']['error']=="0"){
      if($extension=="apk"){
	 if(file_exists($filepath.$_FILES["uplandfile"]["name"])){//判断文件是否存在
           echo "<h1>".$_FILES["uplandfile"]["name"]." be exist!</h1><br>";
       }else{

         if(move_uploaded_file($_FILES["uplandfile"]["tmp_name"], $filepath.$_FILES["uplandfile"]["name"])){

     	echo "<h1>Apk Push to server successfully !</h1>";
       }else{
        echo "<h1>upload APK fail!</h1>";
        }
        }
  }else{
      echo  "<h1>Format of APK error!</h1>";
    }
  }else{
    echo "<h1>Apk can not be empty! please upload Apk! </h1>";
     }

if($_FILES['uplandfile']['error']=="0"){
if(file_exists($filepath.$keystore["name"])){
      	  echo "<h1>".$keystore["name"]." be exist!</h1><br>";
        }else{

			if(move_uploaded_file($keystore["tmp_name"], $filepath.$keystore["name"])){

        $_SESSION["temp"]= array( $uplandfile["name"],$keystore["name"]);	//$_FILES['myFile']['name'] 客户端文件的原名称。  
     	echo "<h1>Keystore Push to server successfully !</h1>";
              }else{
             echo "<h1>Push to server fail!</h1>";
        }
        }
   }else{
    echo "<h1>keystore can not be empty! please upload keystore! </h1>";
      }
if($status=="1"){
    include("register.html");
 }
  	include("start.html");
  
?>
