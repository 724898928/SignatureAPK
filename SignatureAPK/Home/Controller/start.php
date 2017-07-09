
<?php
include("queryvalue.php");
session_start();
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
function signature($filepath,$apkname,$keystore,$aliasName,$suess,$keystorepass){

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
  
 if($status=="1"){
    include("register.html");
     } 
	 include("start.html"); 
 @mysql_close($conn);

?>
