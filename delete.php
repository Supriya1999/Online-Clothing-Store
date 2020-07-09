<html>
<BODY>
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
<h1 align = center > Delete Product </h1><hr> 

<body>
<table border=1 cellpadding=2 cellspacing=2 align="center">
	<tr>
		<th>Category</th>
		<th>Product Name</th>
		<th>Product Image</th>
		<th>Quantity</th>
		<th>Seller</th>
		<th>Price</th>
		<th>Delete</th>
	</tr>
	
	<?php
include ('server.php');
	$query="SELECT * FROM product where category='men'";
 	
 	$menuList = mysqli_query($db,$query);
 	
	foreach($menuList as $menu)
	{?>
	
	<tr>
	<td><?php echo $menu['category']; ?> </td>
	<td><?php echo $menu['pname']; ?> </td>
	<td><img src="<?php echo $menu['imgsrc'];?>" width="200" height="200" > </td>
	<td><?php echo $menu['tqty']; ?> </td>
	<td><?php echo $menu['seller']; ?> </td>
	<td><?php echo $menu['price']; ?> </td>
	<td><center> <a href="delete.php?pid=<?php echo $menu['pid'];?>&action=Delete"> <img src="del.png" width="50" height="50"> </a>
	    </center></td>
	<?php
	}
	?>
	
	<?php
	$query1="SELECT * FROM product where category='women'";
 	
 	$menuList = mysqli_query($db,$query1);
 	
	foreach($menuList as $menu)
	{?>
	
	<tr>
	<td><?php echo $menu['category']; ?> </td>
	<td><?php echo $menu['pname']; ?> </td>
	<td><img src="<?php echo $menu['imgsrc'];?>" width="200" height="200" > </td>
	<td><?php echo $menu['tqty']; ?> </td>
	<td><?php echo $menu['seller']; ?> </td>
	<td><?php echo $menu['price']; ?> </td>
	<td><center> <a href="delete.php?pid=<?php echo $menu['pid'];?>&action=Delete"><img src="del.png" width="50" height="50"></a>
	    </center></td>		
	<?php
	}
	?>
	
</table>
	
	<?php
		if(isset($_GET['action'])=="Delete")
		{
			$pid=$_GET['pid'];
		  	
   	  	
   		$sql="DELETE FROM sizes WHERE pid=$pid";
 
	   	if(mysqli_query($db,$sql))
	   	{
			echo '
				<script type="text/javascript">
				alert("Product Deleted Successfully.");
				location="admin.html";
				</script>
						';
			}

	  
	   	else{
	   		echo "Not Deleted";
	   	}
		
		}
	?>



</body>
</html>
