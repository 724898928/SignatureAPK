<?php
 include("mysql.php");
// $conn = mysql_connect($server,$user,$password);
	
//	if(!$conn){
//	echo "Connect to server error!";	
//	}else{
//      mysql_select_db($dbname,$conn);
//		mysql_query("set names 'UTF-8'");
//	}
	
 $table1= "addinf";
 $table2= "userinf";

$conn = mysql_connect($server,$user,$password);
mysql_query("set names 'utf8'",$conn);
// make foo the current db
//mysql_select_db($dbname,$conn) or die ('Can\'t use foo : ' . mysql_error());

$creatdb = "create database ".$dbname;
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

$data   = array();
$db_name_php = $dbname;   
if (!$conn) {   
echo '不能连接到mysql';   
exit; 
}
$result = mysql_query('show databases;');
While($row = mysql_fetch_assoc($result)){       
$data[] = $row['Database'];
}
unset($result, $row); 
 // mysql_close();   
//print_r($data);

if (in_array(strtolower($db_name_php), $data)){
 //echo '[',$db_name_php,']数据库存在';
 mysql_select_db($dbname,$conn);
}
else{
// echo '[',$db_name_php,']数据库不存在,创建数据库'; 
if (mysql_query($creatdb,$conn))
  {
 // echo "Database created";
if(mysql_select_db($dbname,$conn)){
 //echo "选择成功！";
  //echo mysql_query($createtable1,$conn);
   if(mysql_query($createtable1,$conn)){
   mysql_query("set names 'utf8'",$conn);
  // echo "表1创建成功";
    }else{
  //  echo "表1创建失败";
   }
   if(mysql_query($createtable2,$conn)){
    mysql_query("set names 'utf8'",$conn);
 //  echo "表2创建成功";
    }else{
 //   echo "表2创建失败";
   }
 }else{
//  echo "选择失败！";
   }
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }  

}
//mysql_close($conn);



?>

