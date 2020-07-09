<?php
session_start();
?>

<html>
<title>  </title>

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
	
body{
    height: 100%;
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
    display: block;
    margin-left: auto;
    margin-right: auto;
     width: 800px;
     height: 350px;
}

h1{
        text-align: center;
}


h2, a{
	text-align:center;
	
	}

h3, p{
	text-align:center;
	}
	
.txtbox1{
     position: absolute;
     top: 120px;
     left: 50%;  
     font-size: 15px; 
}  
</style>
</head>




<?php
include('server.php');
$price=$_GET['price'];
$category=$_GET['category'];
$tax=100;
$dc=50;
$totalprice=$price+$tax+$dc;
$id=$_GET['id'];
$query="SELECT * FROM product where pid=$id";
$menuList = mysqli_query($db,$query);
 	
	foreach($menuList as $row)
	{
	

$sqty=$row['sqty'];
$mqty=$row['mqty'];
$lqty=$row['lqty'];
}
?>



<body >
<section>
<ul>
<li><a href="category.php"><font size=5px ><strong>Clothes & Cart</strong></font></a></li>
<li><a href="mproduct.php"><pa><font size=5px >Men</pa></a></li>
<li><a href="wproduct.php"><pa><v>Women</pa></a></li></font>
<li class="logout"><a href="logout.php"><pa><font size=4px >Logout</pa></a></li>
<li class="user"><a><pa>Hi <?php echo $_SESSION['login_user']?><pa></li>
</section>
</ul>	

<table align="center" cellspacing="20">

<tr>
<td>
	<img hspace="40" align="left" src="<?php echo $_GET["imgsrc"]; ?>" width="300" height="300">
	<div class="txtbox1">
	<h1><?php echo $_GET["pname"]; ?><br></h1>
	<h2>Seller:<?php echo $_GET["seller"]; ?><br></h2>
	<h3><?php echo $_GET['description']; ?><br></h3>
	<form method="post" action="genbill.php?img=<?php echo $_GET['imgsrc']; ?>&pname=<?php echo $_GET['pname']; ?>&seller=<?php echo $_GET['seller']; ?>&desc=<?php echo $_GET['description']; ?>&price=<?php echo $price;?>&id=<?php echo $_GET['id'];?>">

	<h3>Size: <select required name="size" id="size"></h3>
	  <option value="">---Select---</option>
	  <option value="small">Small:<?php echo $sqty;?></option>
	  <option value="medium">Medium:<?php echo $mqty;?></option>
	  <option value="large">Large:<?php echo $lqty;?></option>
	</select>
	
	
	<h3> Quantity ( Max 5 at a time): <input type="number" name=qty min="1" max="5" required> </h3><br>
	
	<button type="submit"  class="button3">Generate Bill</button>

	</form>
	<div class="button"> <a href="wproduct.php"><b>Cancel Order</b></a></div>
	
	

</td>
</tr>
</table>
	

</body></div>
</html>


