/**
 * 
 */

function sub() {

	var username = document.myform.username;
	var password = document.myform.password;
	var code = document.myform.code;
	// var password = document.getElementByName('password').values;
	
		
		if (username.value == "" || password.value == ""||code.value == "") {
			alert("username or password can not be empty!"+'\n'+"Verify code can not be empty!");

		} else {
			// document.getElementById('myform').submit();
			document.myform.submit();
		}
}