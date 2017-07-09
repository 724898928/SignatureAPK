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

function registerSub(){
	// alert('ssssss');
	var name=document.registered.email;
	var firstname=document.registered.firstname;
	var lastname=document.registered.lastname;
	var username=document.registered.username;
	var password=document.registered.password;
	var companyname=document.registered.companyname;

	if(name.value==""||	firstname.value==""||
			lastname.value==""||username.value==""||
			password.value==""||companyname.value==""
	){
		alert('Context can not be empty!');
	}else{
		document.registered.submit();
	}
	
}

function resetSub(){
	 alert('reset');
	 document.registered.reset();
}

function myFunction(){
	   // alert("uplandfile");
	    var uplandfile =  Document.ElementByName("uplandfile").name;
		alert(""+uplandfile);
	}

	function insertTitle(path){  
	  alert(path);
	   var path = path;
	 
	}