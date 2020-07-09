<html>
<body>
<table border=1 cellpadding=2 cellspacing=2 align="center">

<?php
$orderid=$_GET['orderid'];
$status=$_GET['status'];
include('server.php');
?>

<form method="post" action="orderupdate.php?orderid=<?php echo $orderid;?>">
<h1 align="center">Update Order Status</h1>
<table border=1 cellpadding=2 cellspacing=2 align="center">

	<tr>
	<th>Order ID</th>
	
	<th>Status</th>
	</tr>
	<tr>
	<td><?php echo $orderid; ?> </td>

	<td>
		<select name="stat">
		<option value="Pending"
			<?php
				if($status=='Pending')
				{
					echo "selected";
				}
			?>
		>Pending
		</option>
		
		<option value="Shipped"
			<?php
				if($status=='Shipped')
				{
					echo "selected";
				}
			?>
			
		>Shipped
		</option>
		
		<option value="Delivered"
			
			
			<?php
				if($status=='Delivered')
				{
					echo "selected";
				}
			?>
		>Delivered
		</option>
		
		</select>
		

	</tr>

</table>
<center>
<input type="submit" name="submit" value="submit">
</center>
</form>
</body>
</html>

<?php
include('server.php');
if(isset($_POST['submit']))
{
$s=$_POST['stat'];

$q="UPDATE orders SET status='$s' where orderid=$orderid";

if(mysqli_query($db,$q))
{
echo '
	<script type="text/javascript">
	alert("Status Updated Successfully.");
	location="orders.php";
	</script>
			';
}

}

?>


