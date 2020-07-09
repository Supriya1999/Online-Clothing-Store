<html>
<body>
<style>
.logout{
	float:right;
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
    float: left;
}
</style>
</head>
<BODY>
<ul>
<li><a href="admin.html"><font size=5px >Admin Home</font></a></li>
<li class="logout"><a href="fe.html"><font size=4px >Logout</a></li>
</ul>

<center>
<h1>
	Orders 
</h1>
</center>
<table border=1 cellpadding=2 cellspacing=2 align="center" >
<tr>
	<th>
	Order ID
	</th>
	
	<th>
	Product ID
	</th>
	
	<th>
	Size
	</th>
	
	<th>
	Quantity
	</th>
		
	<th>
	Amount
	</th>
	
	<th>
	Status
	</th>
	
<?php
include('server.php');
$query="SELECT * FROM orders";
 	
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
	<form method="post" action="">
	
	<tr>
	<td><?php echo $menu['orderid']; ?> </td>
	<td><?php echo $size ?> </td>
	<td><?php echo $menu['quantity']; ?> </td>
	<td><?php echo $menu['pid']; ?> </td>
	<td><?php echo $menu['amount']; ?> </td>
	<td><?php echo $menu['status'];?> </td>
	<td><center> <a href="orderupdate.php?orderid=<?php echo $menu['orderid'];?>&status=<?php echo $menu['status'];?>"> Edit </a>
	<td><a href="invoice-db.php?order=<?php echo $menu['orderid'];?>">Invoive</a></td>
	    </center></td>
	
	    </tr>
	<?php
	}
	?>

</table>
</body>
</html>



