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
<head>


<style> 
input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 3px solid #ccc;
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
}

input[type=text]:focus {
    border: 3px solid #555;
}
.button{ background-color: #FFFF33;
         padding: 15px 32px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
    	 font-size: 16px;
   	 margin: 4px 2px;
   	 cursor: pointer;
	 border-radius: 8px;
}

.left{
	float:left;
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

.user{
	float:right;
	font-size:20px;
	color:white;
	text-align:center;
	}

</style>
</head>
<body>
<section>
<ul>
<li class="left"><font size=5px ><strong>Clothes & Cart</strong></font></li>
<li class="user"><a><pa>Hi <?php echo $_SESSION['login_user']?><pa></li>
</section>
</ul>
<center>


<?php
include('server.php');

$user=$_SESSION['login_user'];

$query="select * from users where username='$user'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_assoc($result);

$fname=$row['fname'];
$lname=$row['lname'];
$phone=$row['phone'];
$address=$row['address'];
echo "First Name:";
echo $row['fname'];
echo "<br>";

echo "Last Name:";
echo $row['lname'];
echo "<br>";

echo "Phone:";
echo $row['phone'];
echo "<br>";


echo "Address:";
echo $row['address'];
echo "<br>";
		
?>
<form method="post" action="address.php">
<input type='submit' name='def_add' value="Deliver To This Address">
<h3><center> OR Add a New Address </center></h3>
<input type="text" name="newadd">
<input type='submit' name='new_add' value="Deliver To This Address">
</form>

<?php
if(isset($_POST['def_add']))
{
	include('server.php');
	$query="insert into address (user,orderid,fname,lname,phone,newaddress) values ('".$user."','".$oid."','".$fname."','".$lname."','".$phone."','".$address."')";
mysqli_query($db, $query);
header('location:confirm.php');
	}
	

if(isset($_POST['new_add']))
{
	include('server.php');
	$address=$_POST['new_add'];
	$query="insert into address (user,orderid,fname,lname,phone,newaddress) values ('".$user."','".$oid."','".$fname."','".$lname."','".$phone."','".$address."')";
mysqli_query($db, $query);
header('location:confirm.php?');
	}
	?>



</body>
</html>





  









