<html>
<head>
<script>
function calc()
  {
    var elm = document.forms["myform"];

    if (elm["sqty"].value != "" && elm["mqty"].value != "" && elm["lqty"].value != "")
      {elm["qty"].value = parseInt(elm["sqty"].value) + parseInt(elm["mqty"].value)+ parseInt(elm["lqty"].value);}
  }
</script>
</head>
<body>
<center>
<h1>Update Details</h1><hr>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

$pid=$_GET['pid'];
include 'server.php';
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT pname,price,seller,tqty,description,imgsrc,category,sqty,mqty,lqty FROM product where pid = $pid";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0){ 
    
   while($row = mysqli_fetch_array($result)){
    $category= $row['category'] ;
    $price = $row['price'] ;
    $t= $row['tqty'];
    $seller = $row['seller'];
    $itemname = $row['pname'];
    $d= $row['description'];
    $s= $row['sqty'];
    $m= $row['mqty'];
    $l= $row['lqty'];
    $img=$row['imgsrc'];
    
?>
<form name="myform" method="post" action="u1.php">
<table width="450" cellpadding="9" cellspacing="9" class="r">
<tr>
	<td>Product Id:</td>
	<td><input type="text" name="pid" value="<?php echo $pid; ?>"></td>
</tr>
<tr> 
   <td>Category:</td>
    <td>
	<input type="text" name="cat" value="<?php echo $category ; ?>">
</tr>

<tr>
	<td>Product Name:</td>
	<td> <input type="text" name="name" value="<?php echo $itemname ; ?>"></td>
</tr>
<tr>
	<td>Seller:</td>
	<td> <input type="text" name="seller" value="<?php echo $seller ; ?>"></td>
</tr>
<tr>
	<td>Total Quantity:
	<input type="text" name="qty" size="5" value="<?php echo $t ; ?>"></td>
        <td>
	<table>
	 <tr>
		<th>Size</th>
		<th>Quantity</th>
	 </tr> 
	<tr>
		<td>S :</td>
		<td><input type="text" name="sqty" size="5" value="<?php echo $s ; ?>" onkeyup="calc()"></td>
	</tr>
	<tr>
		<td>M :</td>
		<td><input type="text" name="mqty"size="5" value="<?php echo $m ; ?>" onkeyup="calc()"></td>
	</tr>
	<tr>
		<td>L :</td>
		<td><input type="text" name="lqty"size="5" value="<?php echo $l ; ?>" onkeyup="calc()"></td>
	</tr>
      </table>
	</td>
</tr>
<tr>
	<td>Price:</td>
	<td><input type="text" name="price" value="<?php echo $price ; ?>"></td>
</tr>

<tr>
    <td>Description:</td>
    <td>
          <textarea name="desc" rows="5" cols="35"><?php echo $d ; ?> </textarea>     
          <div style = "visibility:hidden;"><input type = "text" name = "lable" id = "optionlable" ></div></td>
</tr>

<tr>
	<td>Uploaded Image: </td>
	<td><img src="<?php echo $img ?> "width="200" height="200"><!-input type = "file" name = "FileToUpload" > </td>

</tr>

<tr>
	<td>&nbsp;</td>
	<td><input name = "submit" type = "submit"  value = "Update">
               <input name="clear" type = "reset" value = "Clear" >       
	<!a href="u1.php?pid=<?php echo $pid;?>">
<!img src="u.png" width="100" height="70"></a><br>	
            </td>
</tr>
</table> 
</form>
</center>

<?php	
        }
        // Close result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
 
if(isset($_POST['submit']))
{
$pid=$_POST['pid'];
	$c = $_POST['cat'];
$q = $_POST['qty'];
$sqty = $_POST['sqty'];
$mqty = $_POST['mqty'];
$lqty = $_POST['lqty'];
$itemname= $_POST['name'];
$price = $_POST['price'];
$seller=$_POST['seller'];
$d=$_POST['desc'];	  
   	  	

   		 $sql = "UPDATE product SET pname='$itemname',price=$price,seller='$seller',tqty=$q,description='$d',category='$c',sqty=$sqty,mqty=$mqty,lqty=$lqty where pid=$pid "; 
	
  	
  	
  	$sql1="UPDATE sizes set qty=$sqty where pid=$pid";
  	$sql2="UPDATE sizem set qty=$mqty where pid=$pid";
  	$sql3="UPDATE sizel  set qty=$lqty where pid=$pid";
  	$success=mysqli_query($db,$sql);
   	$success1=mysqli_query($db,$sql1);
   	$success2=mysqli_query($db,$sql2);
   	$success3=mysqli_query($db,$sql3);   	
header("location:admin.html");
}

?>
</body>
</html>

