<?php
include("connserver.php");
 $apkname = @$_SESSION["temp"][0];
 $keystore = @$_SESSION["temp"][1];
  if(!empty($keystore)){
  $keystorepass=@$_POST["keystorepass"];
  $aliasName = @$_POST["aliasName"];
  $filepath = @$_SESSION["conf"][3];
  $rootpath = @$_SESSION["conf"][4];
 
 $companyname =@ $_SESSION["conf"][2];

 $select = "select *from addinf where keystore ='$keystore';";
 
   $query = @mysql_query($select); 
   $result = @mysql_fetch_array($query);
   $rekey = @$result['keystorepass'];
   $aliasn =  @$result['aliasName'];
}

?>
