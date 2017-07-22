<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>registered</title>
<link rel='stylesheet' type="text/css" href='/SignatureAPK/Public/Css/basic.css'></link>
<script src='/SignatureAPK/Public/Js/basic.js'>
	
</script>
</head>

<body>
	<center>
		<h1>Account registered</h1>
		<div>
			<form name="registered" action='/SignatureAPK/index.php/Home/Register/registeredJudge'
				method="post">
				<table>
					<tr>
						<td>E-mail address:</td>
						<td><input type="text" name="email" value=""></td>
					</tr>
					<tr>
						<td>First &nbsp &nbsp name &nbsp&nbsp:</td>
						<td><input type="text" name="firstname" value=""></td>
					</tr>
					<tr>
						<td>Last &nbsp&nbsp name &nbsp&nbsp&nbsp:</td>
						<td><input type="text" name="lastname" value=""></td>
					</tr>
					<tr>
						<td>username&nbsp&nbsp&nbsp&nbsp:</td>
						<td><input type="text" name="username" value=""></td>
					</tr>
					<tr>
						<td>password&nbsp&nbsp&nbsp&nbsp:</td>
						<td><input type="password" name="password" value=""></td>
					</tr>
					<tr>
						<td>CompanyName:</td>
						<td><input type="text" name="companyname" value=""></td>
					</tr>
					<tr>
						<td><img align="middle" src='/SignatureAPK/Public/Img/reset.jpg'
							onclick='resetSub()' /></td>
						<td><img align="middle" src='/SignatureAPK/Public/Img/submit.jpg'
							onclick='registerSub()' /></td>
					</tr>
				</table>
			</form>
		</div>
	</center>
</body>
</html>