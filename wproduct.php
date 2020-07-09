<?php
session_start();

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Products</title>
</head>

<style>

.user{
	float:right;
	font-size:20px;
	color:white;
	text-align:center;
	}
	
	
.logout{
	float:right;
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
    float: left;
}

td img{
    display: block;
    margin-left: 20px;
    margin-top: 10px;
    width: auto;
}

td{
	background-color: white;
    display: block;
    margin-left: auto;
    margin-right: auto;
     width: 800px;
     height: 350px;
}


h2, a{
	text-align:center;

	
	}

h3, p{
	text-align:center;
		font-size:20px;
	} 


.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 

</style>


<body background="background.jpg">


<section>
<ul>
<li><a href="category.php"><font size=5px ><strong>ClothKart</strong></font></a></li>
<li><a href="mproduct.php"><pa><font size=5px >Men</pa></a></li>
<li><a href="wproduct.php"><pa><v>Women</pa></a></li></font>
<li class='left'><a href="myorder.php"><pa><v>My Orders</pa></a></li></font>
<li class="logout"><a href="logout.php"><pa><font size=4px >Logout</pa></a></li>
<li class="user"><a><pa>Hi <?php echo $_SESSION['login_user']?><pa></li>
</section>

</ul>
<div id="grad1">
<br>
<form method="post" action="<?php $_PHP_SELF ?>" enctype = "multipart/form-data"> 
<table align="center" cellspacing="20">
     

	<?php
	include('server.php');
	$query="SELECT * FROM product where category='women' ";
 	
 	$menuList = mysqli_query($db,$query);
 	
	foreach($menuList as $menu)
	{
	?>
	<tr>
	<td>
	<img hspace="40" align="left" src="<?php echo $menu['imgsrc']; ?>" width="240" height="280" />
		
<a href="payment.php?pname=<?php echo $menu['pname']; ?>&price=<?php echo $menu['price']; ?>&imgsrc=<?php echo $menu['imgsrc'];?>&category=men&seller=<?php echo $menu['seller']; ?>&description=<?php echo $menu['description']; ?>&id=<?php echo $menu['pid']; ?>">
		
		<h2><?php echo $menu['pname']; ?></h2> </a>
		<h3><?php echo $menu['description']; ?></h3><br>
		<h3>Seller: <?php echo $menu['seller']; ?></h3> <br>
	
		<h3>RS:<?php echo $menu['price']; ?></h3> 
		 

	 </td>
	 </tr>
	 <br>
	<?php
	}
	?>
  </table>
 </form> 


</body></div>
</html> 

