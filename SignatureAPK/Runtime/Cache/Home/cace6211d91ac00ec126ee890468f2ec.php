<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Signature Server</title>
<link rel='stylesheet' type='text/css' href='/SignatureAPK/Public/Css/basic.css' />
<script src='/SignatureAPK/Public/Js/basic.js'>
	
</script>

</head>
<center>
	<body>
		<h1>Account Login</h1>
		<div>

			<form action='/SignatureAPK/index.php/Home/Start/start' method='post' name="myform">
				<table>
					<tr>
						<td>User name :</td>
						<td><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td>Pass word :</td>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td>Verify code:</td>
						<td><input type='text' name='code' /> <img
							src='/SignatureAPK/index.php/Home/Index/Verify'
							onclick="this.src=this.src+'?'
						    		+Math.random()"
							alt="点击图片切换" /></td>
					</tr>
					<tr>
					  <td></td>
					  <td><a href='/SignatureAPK/index.php/Home/Register/register'><img src='/SignatureAPK/Public/Img/register.png'/></a>&nbsp&nbsp&nbsp<img src='/SignatureAPK/Public/Img/login.png' 
					   onclick='sub()' /></td>
					</tr>
					</table>
			</form>
		</div>
	</body>
</center>
</html>