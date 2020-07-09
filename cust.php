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

<h1 align = center > Customers </h1><hr> 

<body>
<table border=1 cellpadding=10 cellspacing=2 align="center">
	<tr>

		<th>First Name</th>
		<th>Last Name</th>
		<th>Email Id</th>
		<th>Phone Number</th>
		<th>Address</th>
	</tr>
	
	<?php

	include('server.php');


	$query="SELECT fname,lname,email,phone,address FROM users";
 	
 	$menuList = mysqli_query($db,$query);
 	
	foreach($menuList as $menu)
	{?>
	
	<tr>

	<td><?php echo $menu['fname'] ;?></td>
	<td><?php echo $menu['lname'] ; ?> </td>
	<td><?php echo $menu['email']; ?> </td>
	<td><?php echo $menu['phone']; ?> </td>
	<td><?php echo $menu['address']; ?> </td>
	
	<?php
	}
	?>
	
	
</table>


</body>
</html>
