<html>
<head>
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

<h1 align = center > Products </h1><hr> 

<body>
<table border=1 cellpadding=10 cellspacing=1 align="center"  bordercolor="blue">
	<tr>
	<th>Women</th>
	<th>Men</th>
	</tr>


<tr>
<td>
  <table border=1 cellpadding=5 cellsapcing=2 align="center">
   <tr>
		<th>Product Name</th>
		<th>Seller</th>
		<th>Price </th>
		<th>Quantity</th>
		<th>Image</th>
  </tr>
	
	<?php

	include('server.php');

	$query="SELECT pname,seller,price,tqty,imgsrc FROM product where category='women' ";
 	
 	$menuList = mysqli_query($db,$query);
 	
	foreach($menuList as $menu)
	{?>
	
	<tr>
	<td><?php echo $menu['pname']; ?> </td>
	<td><?php echo $menu['seller'] ;echo " "; echo $menu['lname'] ; ?> </td>
	<td><?php echo $menu['price']; ?> </td>
	<td><?php echo $menu['tqty']; ?> </td>
	<td><img src="<?php echo $menu['imgsrc']; ?>" width="100" height="100"></td>
	
	<?php
	}
	?>
</table>
</td>
<td>
 <table border=1 cellpadding=5 cellsapcing=2 align="center">
   <tr>
		<th>Product Name</th>
		<th>Seller</th>
		<th>Price </th>
		<th>Quantity</th>
		<th>Image</th>
  </tr>
		<?php

	include('server.php');

	$query="SELECT pname,seller,price,tqty,imgsrc FROM product where category='men' ";
 	
 	$menuList = mysqli_query($db,$query);
 	
	foreach($menuList as $menu)
	{?>
	
	<tr>
	<td><?php echo $menu['pname']; ?> </td>
	<td><?php echo $menu['seller'] ;echo " "; echo $menu['lname'] ; ?> </td>
	<td><?php echo $menu['price']; ?> </td>
	<td><?php echo $menu['tqty']; ?> </td>
	<td><img src="<?php echo $menu['imgsrc']; ?>" width="100" height="100"></td>
	
	<?php
	}
	?>
</table>
</td>
</td>
</tr>
</table>


</body>
</html>
