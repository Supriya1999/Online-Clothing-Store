
<?php
session_start();
?>

<?php

	include('server.php');
	$user=$_SESSION['login_user'];
	$id=$_GET['pid'];
	$qty=$_GET['qty'];
	$size=$_GET['size'];
	$amount=$_GET['amt'];
	$query2="update product SET tqty=tqty-$qty where pid=$id";
	mysqli_query($db,$query2);
	
	if($size=='small')
	{
		$query="update sizes SET qty=qty-$qty where pid=$id";
		mysqli_query($db,$query);
	}
	
	if($size=='medium')
	{
		$query="update sizem SET qty=qty-$qty where pid=$id";
		mysqli_query($db,$query);
	}
	
	if($size=='large')
	{
		$query="update sizel SET qty=qty-$qty where pid=$id";
		mysqli_query($db,$query);
	}
	
	?>
	
<?php
include('server.php');
if($size=='small')
	{
		$sid=1;
	}
if($size=='medium')
	{
	$sid=2;
	}
	
if($size=='large')
	{
		$sid=3;
	}
	
$query="insert into orders (user,sid, quantity, pid, amount) values ('".$user."','".$sid."','".$qty."','".$id."','".$amount."')";
mysqli_query($db, $query);
header('location:address.php');
?>
