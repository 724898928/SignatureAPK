SignatureAPK签名服务器

Instructions for users

Features

 The role of this site system is to signature APK .
 
Steps for usage

1. Click “register” to register information of the user.(information of the user can
    not be empty)
		
2. Sign in after registration is complete.

3. “Select the APK to be signed” -> “Select the keystore to be signed” -> Click
    “PushApkAndKeystore”.
		
4. Enter “keystorePassword”  and  “AliasNameOfApk” ,Click
    “stratSignatureAPK”.
		
5. Click “DownloadSignatureAPK” ,Download APK to the local.

Note:

 The administrator is the system maintainer who has permission to add the deleted data .
 
 Environment building
 
Hardware requirements

There is a linux system for the server.

Software requirements

 There is a xampp that PHP integrated development environment software under linux. (Download link :http://www.apachefriends.org/download.php?xampp-linux-1.6.7.tar.gz)
 
Simple installation method

1. Please install as root.

       sudo su
       
     Enter the current user password
     
2. Release the downloaded zip file to opt.

      tar xvfz xampp-linux-1.6.7.tar.gz -C /opt
      
3. Start up.

      /opt/lampp/lampp start
      
      You will see the following information:
      
      Starting XAMPP 1.6.7...
      
      LAMPP: Starting Apache...ok.
      
      LAMPP: Starting MySQL...ok.
      
      LAMPP started.
      
4. Congratulations on your success.


5.If you want stop xampp .

   /opt/lampp/lampp stop
   
6.If you want uninstall Xampp .

    rm -rf /opt/lampp

 
 
