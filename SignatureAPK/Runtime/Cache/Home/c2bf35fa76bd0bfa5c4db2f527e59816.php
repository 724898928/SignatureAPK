<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>SignatureAPK</title>
 <meta charset="utf-8">
<script src='/SignatureAPK/Public/Js/basic.js'>
</script>
</head>

<center>

<body>
<h1>SignatureAPK</h1>

<div>
  <table >
   <form name="pushtoserver"  action='/SignatureAPK/index.php/Home/Start/pushtoserver' method= "post" >
		   <tr>
			      <td><input type = "file" name= "uplandfile"></td>
			      <td>Select the APK to be signed</td>
		   </tr>
		   <tr>
			      <td><input type = "file" name= "Pushkeystore" onclick="getpass()"></td>
			      <td>Select the keystore to be signed</td>
		   </tr>
			<tr>
				<td></td>
                <td><img src='/SignatureAPK/Public/Img/register.png' onclick='PushApkKey()'/></td>
            </tr>
 </form>
 <form action='/SignatureAPK/index.php/Home/Start/startSignature' name='startSignature' enctype="multipart/form-data" method= "post">
		   <tr>
			      <td><input type = "text" name= "keystorepass" ></td>
			      <td>keystorePassword</td>
		   </tr>
		   <tr>
			      <td><input type = "text" name= "aliasName" ></td>
			      <td>AliasNameOfApk</td>
		   </tr>
		   <tr>
			      <td><button onclick='startSignature()' name= "signatureapk" >stratSignatureAPK</button>
			      <td><input type = "button" onclick = "window.location='downloadapk.php'"  name= "downloadapk" value= "DownloadSignatureAPK"></td>
		   </tr>
		</form>
  </table>
</div>
</body>
</center>
</html>