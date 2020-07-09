<?php
session_start();
?>

<?php
include('server.php');

$p="select orderid from orders order by orderid desc limit 1";
$q=mysqli_query($db, $p);
$rowss=mysqli_fetch_assoc($q);
 $oid=$rowss['orderid'];

?>  	
<html>
<body>
<center>

<style> 

.left{
	float:left;
	}


.user{
	float:right;
	font-size:20px;
	color:white;
	text-align:center;
	}
	

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
    border: 1px solid #555;
}
li {
    display: block;
    color: white;
    text-align: center;
    padding: 20px 16px;
    text-decoration: none;

} 	

</style>

<section>
<ul>
<li class="left"><font size=5px ><strong>Clothes & Cart</strong></font></li>
<li class="user"><a><pa>Hi <?php echo $_SESSION['login_user']?><pa></li>
</section>
</ul>
<br><hr>
<?php
include('server.php');

$user=$_SESSION['login_user'];
$add=$_GET['add'];
$query="select * from address where username='$user' AND newaddress='$add'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_assoc($result);

$orderid=$row['orderid'];
echo "Order Placed Successfully<br>";
echo "Your Order ID is:";
echo $oid;
echo '<br> Status:Pending';
	?>
	

<br>
<a href="invoice-db.php?order=<?php echo $oid?>">Invoive</a>
<br><br>	
<a href="category.php">Continue Shopping </a>
<br>
<a href="logout.php">Logout</a>
	




</body>
</html>



