<?php
  include("connserver.php");
  
	$email =Str_replace("","",$_POST["email"]);
	$firstname = Str_replace("","",$_POST["firstname"]);
	$companyname =Str_replace("","", $_POST["companyname"]);
    $lastname =Str_replace("","", $_POST["lastname"]);

    $username =Str_replace("","", $_POST["username"]);
    $password =Str_replace("","", $_POST["password"]);
	$sql1 = "insert into userinf (username,password,email,firstname,lastname,companyname)
          values('$username','$password','$email','$firstname','$lastname','$companyname');";
    $sql2= "select *from userinf where username = '$username';";


if(empty($username)||empty($password)||empty($email)||
empty($firstname)||empty($companyname)||empty($lastname)){
echo "<h1>Can not be empty!</h1>";
		include("register.html");
		include("start.html");
}else{

 if(strlen($password)<8){
 echo "<h1>The password can not be less than 8 digits.</h1>";
       include("register.html");
		include("start.html");
} else{

if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
    echo "<h1>Email is Illegal!</h1>";
    include("register.html");
	include("start.html");
}else{
$query2 = mysql_query( $sql2);
$rs =mysql_fetch_array($query2);
 if($rs){
		echo "<h1>The username was used !</h1>";
		include("register.html");
		include("start.html");
}else{

    $query1 = mysql_query($sql1);
   //echo 	$query;
   $res = @mysql_fetch_array($query1);
	$query2 = mysql_query( $sql2);
    $rs =mysql_fetch_array($query2);
   if(is_array($rs)){
   if($username==$rs['username']){
            echo "<h1>registered succeed</h1>";
		include("register.html");
         include("start.html");
      }else{
		echo "<h1>registered fail</h1>";
		include("register.html");
		include("start.html");
      }
   }else{
   echo "<h1>registered fail</h1>";
		include("register.html");
		include("start.html");
    }
       }
    }
}
}
  mysql_close($conn);
 ?>
