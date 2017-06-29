<?php
/*****
***  文件下载
***
***/ 
  session_start();
 
    @$filename = $_SESSION['temp'][0];
    @$keystore = $_SESSION['temp'][1];
    $keystorepass = $_SESSION["keyname"][0];  
    $aliasName = $_SESSION["keyname"][1];
	@$suess = $_SESSION["keyname"][2];
    $filepath = $_SESSION["conf"][3];
   
	$status =  $_SESSION["conf"][5];


   //使用绝对路径
echo $suess."////";
   $filepath = $filepath.$filename;
if($suess=="y"){
	if(!file_exists($filepath)){
      echo "<h1>Not fond file!</h1>";
		}else{	
    header("Content-type:text/html;charset=utf-8"); 
	download($filepath, $filename);
  }	
  }else{
     echo "<h1>Has not signed, signed before you can download !</h1>";  
  }
if($status=="1"){
    include("register.html");
 }
 include("start.html");
function download($filename,$down_name){
 		$suffix=substr($filename,strrpos($filename,'.'));//获取文件后缀
		$down_name = $down_name.$suffix;  //新文件名，就是下载后的名字
		//判断给定的文件是否存在
		if(!file_exists($filename)){
		   echo "file not fond!";
			}else{
			$fp = fopen($filename,"r");
			$file_size = filesize($filename);
			//下载文件需要用到的头
			header("Content-type:application/octet-stream");
			header("Accept-Ranges:bytes");
			header("Accept-Length:".$file_size);
			header("Content-Disposition:attachment; filename = ".$down_name);			
		$buffer = 1024;
		$file_count = 0;
		//向浏览器返回数据
	 	while(!feof($fp)&& $file_count < $file_size){
			$file_con = fread($fp,$buffer);
 		    $file_count +=$buffer;
           echo $file_con;	
        }	
	    fclose($fp);
        }
     }
$_SESSION["conf"][5]="no";
?>
