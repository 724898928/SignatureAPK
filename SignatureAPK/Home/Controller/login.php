<?php
 session_start();
 include("connserver.php");
 echo "uername=".$_POST["user"]."<br>";
  $username = $_POST["user"];
  $password = $_POST["password"];
  $rootpath = $_SERVER['DOCUMENT_ROOT'];
 //echo $password."<br>";
  $sqlselect = "select *from userinf where username = '$username';";

if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty($username)||empty($password)){
	echo "<h1>The Uername or Password can not be empty !</h1>";
	include("login.html");
}
else{
   if(preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/", $username)||
     preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/", $password)){  //不允许特殊字符
                  echo "<h1>Username or Password Contains illegal characters</h1> ";
					include("login.html");
      }else{
//			echo "333333333"."<br>";
    		$query = mysql_query($sqlselect);
			$result = @mysql_fetch_array($query);
 ///           echo "3333444444"."<br>";  
			if(is_array($result)){
//			echo  $result['password']."<br>";
				 if($password == $result['password']){
                      $filepath = $_SERVER['DOCUMENT_ROOT']."/".$result['companyname']."/";
                     if(!is_dir($filepath)){
                                      mkdir($filepath); 
                                      chmod($filepath,0777);
 		                            //  echo  "mkdir";
                                }
				 if($result['status']=="1"){
                      include("register.html");
                       }   

                       $_SESSION["conf"]= array( $result['username'],$result['password'], $result['companyname'], $filepath,$rootpath,$result['status']);
						include("start.html");
						}else{
							echo "<h1>Username or Password is error</h1>";
								include("login.html");
							}				
				}else{
				echo "<h1>Username or Password is error</h1>";
					include("login.html");
             }

        }

   }
}
@mysql_close($conn);
?>
