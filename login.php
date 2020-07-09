
<?php
session_start();
include('server.php');
		
		$username =  $_POST['username'];
		$password =  $_POST['password'];



$query=mysqli_query($db,"select * from users where username='$username' and password='$password'");


if(($row=mysqli_num_rows($query))!=0){

	$_SESSION['login_user']=$username;	
	header('location:category.php');
	
	
}
else{
     	echo "Incorrect Password";   
	header('location:login.html');
}

?>

