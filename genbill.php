<?php
session_start();
?>

<html>
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
	
.button{ background-color: #FFF;
         padding: 15px 15px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
    	 font-size: 16px;
   	 margin: 4px 2px;
   	 cursor: pointer;
	 border-radius: 8px;
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
	
.box1{
     position: absolute;
     background-color: white;
     border-radius: 8px;

}
	
.txtbox1{
     position: absolute;
     top: 120px;
     left: 50%;  
     font-size: 10px; 
}
</style>

</head>
<body style="background-color:#DCDCDC;">

<?php
$pid=$_GET['id'];
$qty=$_POST['qty'];
$size=$_POST['size'];
$price=$_GET['price'];
$tax = 100;
$dc = 50;
$p=$price * $qty;

$totalprice = $p + $tax + $dc;


?>

<div id="grad1">

<body>
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
<div class="box1">
<tr>
<td>
	<img hspace="40" align="left" src="<?php echo $_GET["img"]; ?>" width="250" height="250">

<div class="txtbox1">
	<h1><?php echo $_GET["pname"]; ?><br></h1>
	<h1>Seller:<?php echo $_GET["seller"]; ?><br></h2>
	<h2><?php echo $_GET["description"]; ?><br></h3>
	<h2> Quantity:<?php echo $qty;?></h3>
	<h2>Size: <?php echo $size;?></h3>
	<h2>Price:Rs.<?php echo $price; ?><br></h2>
	<h2>Tax:Rs.<?php echo $tax?><br></h3>
	<h2>Delivery Charges:<?php echo $dc?><br></h3>
	<h1>Amount Payable: <?php echo $totalprice?><br></h1>
	
	<center>
<a class="button" href="bill.php?qty=<?php echo $qty;?>&pid=<?php echo $pid;?>&size=<?php echo $size;?>&amt=<?php echo $totalprice?>"> Bill</a>
	</center>
	</div>

</table>


</body>
</html>








