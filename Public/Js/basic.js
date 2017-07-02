/**
 * 
 */

function sub(){
	
	 var username = document.myform.username;
	 var password = document.myform.password;
//		var password = document.getElementByName('password').values;
 
	if(username.value==""||password.value==""){
		alert("username or password can not be empty!");
	}else{
		//document.getElementById('myform').submit();
		document.myform.submit();
	}
	
}