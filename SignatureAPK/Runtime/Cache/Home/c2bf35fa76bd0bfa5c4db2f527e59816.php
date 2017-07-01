<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
   <title>SignatureAPK
   </title>
 <meta charset="utf-8">
<script>
function myFunction(){
   // alert("uplandfile");
    var uplandfile =  Document.ElementByName("uplandfile").name;
	alert(""+uplandfile);
}

function insertTitle(path){  
  alert(path);
   var path = path;
 
}
</script>
</head>
<center>

<body>
<h1>SignatureAPK</h1>
<div>
  <table>
   <form action="pushtoserver.php" enctype="multipart/form-data" method= "post" >
		   <tr>
			      <td><input type = "file" name= "uplandfile"></td>
			      <td>Select the APK to be signed</td>
		   </tr>
		   <tr>
			      <td><input type = "file" name= "Pushkeystore"></td>
			      <td>Select the keystore to be signed</td>
		   </tr>
			<tr>
				<td><button type = "submit" name= "ApkAndKeysubmit">PushApkAndKeystore</button></td>
                <td></td>
            </tr>
 </form>
 <form action= "start.php" enctype="multipart/form-data" method= "post">
		   <tr>
			      <td><input type = "text" name= "keystorepass" value="<?php include('queryvalue.php'); if(empty($rekey)){}else{echo $rekey;} @mysql_close($conn);?>" ></td>
			      <td>keystorePassword</td>
		   </tr>
		   <tr>
			      <td><input type = "text" name= "aliasName" value= "<?php include('queryvalue.php'); if(empty($aliasn)){}else{echo $aliasn;} @mysql_close($conn);?>"></td>
			      <td>AliasNameOfApk</td>
		   </tr>
		   <tr>
			      <td><input type = "submit" name= "signatureapk" value= "stratSignatureAPK">
			      <td><input type = "button" onclick = "window.location='downloadapk.php'"  name= "downloadapk" value= "DownloadSignatureAPK"></td>
		   </tr>
		</form>
  </table>
</div>
</body>
</center>
</html>