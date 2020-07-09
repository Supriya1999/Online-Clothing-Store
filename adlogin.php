<?php
session_start();
include('server.php');
		
		$username =  $_POST['username'];
		$password =  $_POST['password'];



$query=mysqli_query($db,"select * from admin where adminname='$username' and password='$password'");
if(($row=mysqli_num_rows($query))!=0){

	$_SESSION['uid']=$uid;
	$_SESSION['login_user']=$username;
	header('location:admin.html');
	
	
}
else{
     	echo "Incorrect Password";   
	header('location:adlogin.html');
}

?>

