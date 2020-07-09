<?php
session_start();
include('server.php');
?>
<html>
<body>
<head>
<style>
.logout{
	float:right;
	}
	
	.user{
	float:right;
	font-size:20px;
	color:white;
	text-align:center;
	}
#grad1 {
    height: auto;
    background: linear-gradient( #ffffff,#3CB371,#48D1CC,#2E8B57);
    opacity: 1; 
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
    border: 1px solid #555;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 20px 16px;
    text-decoration: none;

}

.left{
	float:left;
	}




h2, a{
	text-align:center;

	
	}

h3, p{
	text-align:center;
		font-size:20px;
	} 

</style>
</head>
<section>
<ul>
<li class='left'><a href="category.php"><font size=5px ><strong>ClothKart</strong></font></a></li>
<li class='left'><a href="mproduct.php"><pa><font size=5px >Men</pa></a></li>
<li class='left'><a href="wproduct.php"><pa><v>Women</pa></a></li></font>
<li class='left'><a href="myorder.php"><pa><v>My Orders</pa></a></li></font>
<li class="logout"><a href="logout.php"><pa><font size=4px >Logout</pa></a></li>
<li class="user"><a><pa>Hi <?php echo $_SESSION['login_user']?><pa></li>
</section>
<br><br><br>
<table border=1 cellpadding=2 cellspacing=2 align="center">
	<tr>
		<th>OrderID</th>
		<th>Size</th>
		<th>Quantity</th>
		<th>Product ID</th>
		<th>Amount</th>
		<th>Status</th>	
	</tr>
<?php
session_start();
include('server.php');
$username=$_SESSION['login_user'];
$query="SELECT * FROM orders where user='$username'";
 	
 	$menuList = mysqli_query($db,$query);
 	
	foreach($menuList as $menu)
	{
	if($menu['sid']==1)
		{
			$size="Small";
			}
	if($menu['sid']==2)
		{
			$size="Medium";
			}
	if($menu['sid']==3)
		{
			$size="Large";
			}
			
			
			?>
	
	<tr>
	<td><?php echo $menu['orderid']; ?> </td>
	<td><?php echo $size ?> </td>
	<td><?php echo $menu['quantity']; ?> </td>
	<td><?php echo $menu['pid']; ?> </td>
	<td><?php echo $menu['amount']; ?> </td>
	<td><?php echo $menu['status'];?> </td>
	<td><a href="invoice-db.php?order=<?php echo $menu['orderid'];?>">Invoive</a></td>
	    </center></tr>
	<?php
	}
	?>

</table>
</body>
</html>
