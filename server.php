<?php
	$server="localhost";
	$username="root";
	$password="password";
	$db="test";
	$db = mysqli_connect($server, $username, $password, $db);
	
	
	if($db)
	{
		echo "";
	}
	
	else
	{
		echo "Connection failed because". mysqli_connect_error();
	}
	 

	
?>
