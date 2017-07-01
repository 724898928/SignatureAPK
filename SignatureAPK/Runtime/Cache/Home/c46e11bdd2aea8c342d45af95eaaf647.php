<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <title>registered</title>
</head>
<center>
<body>
   <h1>Account registered</h1>
   <div>
   <form name ="registered" action = "register.php" method="post">
     <table>
		<tr>
			<td>E-mail address:</td>
			<td><input type= "text" name= "email" value=""></td>
		</tr>
		<tr>
			<td>First &nbsp &nbsp name  &nbsp&nbsp:</td>
			<td><input type= "text" name= "firstname" value=""></td>
		</tr>
		<tr>
			<td>Last &nbsp&nbsp name &nbsp&nbsp&nbsp:</td>
			<td><input type= "text" name= "lastname" value=""></td>
		</tr>
		<tr>
			<td>username&nbsp&nbsp&nbsp&nbsp:</td>
			<td><input type= "text" name= "username" value=""></td>
		</tr>
<tr>
			<td>password&nbsp&nbsp&nbsp&nbsp:</td>
			<td><input type= "password" name= "password" value=""></td>
		</tr>
		<tr>
			<td>CompanyName:</td>
			<td><input type= "text" name= "companyname" value=""></td>
		</tr>
	 </table>
	<table>
		<tr>
			<td><input type="reset" name = "reset" value="reset"> &nbsp&nbsp&nbsp&nbsp</td>
			<td>&nbsp&nbsp&nbsp&nbsp<input type="submit" name = "submit" value = "submit"> </td>
	    </tr>
			
	 </table>
   </form>

   </div>
</body>
</center>

<script src = "" type= "text/javascript">
</script>
</html>