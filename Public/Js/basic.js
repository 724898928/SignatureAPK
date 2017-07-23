/**
 * 
 */

function sub() {

	var username = document.myform.username;
	var password = document.myform.password;
	var code = document.myform.code;
	// var password = document.getElementByName('password').values;

	if (username.value == "" || password.value == "" || code.value == "") {
		alert("username or password can not be empty!" + '\n'
				+ "Verify code can not be empty!");

	} else {
		// document.getElementById('myform').submit();
		document.myform.submit();
	}
}

function registerSub() {
	// alert('ssssss');
	var name = document.registered.email;
	var firstname = document.registered.firstname;
	var lastname = document.registered.lastname;
	var username = document.registered.username;
	var password = document.registered.password;
	var companyname = document.registered.companyname;

	if (name.value == "" || firstname.value == "" || lastname.value == ""
			|| username.value == "" || password.value == ""
			|| companyname.value == "") {
		alert('Context can not be empty!');
	} else {
		document.registered.submit();
	}

}

function resetSub() {
	alert('reset');
	document.registered.reset();
}

function myFunction() {
	// alert("uplandfile");
	var uplandfile = Document.ElementByName("uplandfile").name;
	alert("" + uplandfile);
}

function insertTitle(path) {
	alert(path);
	var path = path;

}

function PushApkKey() {
	alert("Do you true?");
	document.pushtoserver.submit();
}

function startSignature(){
	alert("startSignature()");
}
function getPasAlias(){
	//alert("getpass()");
	var xmlhttp;
	if(window.XMLHttpRequest){
		//code for IE7+ ,FIREFOX , Chrome
		xmlhttp = new XMLHttpRequest();
	}else{
		//code for IE 6
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
		document.getElementById("").innerHTML= xmlhttp.responseText;
		}
	}
	var url ="";
	var data="";
	xmlhttp.open("Post",url,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("");
	
}

