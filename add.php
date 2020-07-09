<html>
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

<head><title>ADD PRODUCTS</title>
<script>
function calc()
  {
    var elm = document.forms["myform"];

    if (elm["sqty"].value != "" && elm["mqty"].value != "" && elm["lqty"].value != "")
      {elm["qty"].value = parseInt(elm["sqty"].value) + parseInt(elm["mqty"].value)+ parseInt(elm["lqty"].value);}
  }
</script>
</head>

<body bgcolor=" #f2f3f4">

<center>
<h2>ADD PRODUCTS</h2><hr><br>
<form name="myform" method="post" action="<?php $_PHP_SELF ?>" enctype = "multipart/form-data">
<table width="450" cellpadding="9" cellspacing="9">
<tr>
    <td>Category:</td>
    <td>
	<input type="radio" name="cat" value="men" >        
	Men  
	 &nbsp;&nbsp;  &nbsp;
        <input type="radio" name="cat" value="women" required>
        Women </td>
</tr>

<tr>
	<td>Product Name:</td>
	<td> <input type="text" name="name" required></td>
</tr>
<tr>
	<td>Seller:</td>
	<td> <input type="text" name="seller" required></td>
</tr>
<tr>
	<td>Total Quantity:
	<input type="text" name="qty" size="5"></td>
        <td>
	<table>
	 <tr>
		<th>Size</th>
		<th>Quantity</th>
	 </tr>
	<tr>
		<td>S :</td>
		<td><input type="text" name="sqty" size="5" onkeyup="calc()"></td>
	</tr>
	<tr>
		<td>M :</td>
		<td><input type="text" name="mqty"size="5" onkeyup="calc()"></td>
	</tr>
	<tr>
		<td>L :</td>
		<td><input type="text" name="lqty"size="5" onkeyup="calc()"></td>
	</tr>
      </table>
	</td>
</tr>
<tr>
	<td>Price:</td>
	<td><input type="text" name="price" required></td>
</tr>

<tr>
    <td>Description:</td>
    <td>
          <textarea name="desc" rows="5" cols="35" required ></textarea>     
          </td>
</tr>

<tr>
	<td>Upload Image: </td>
	<td><input type = "file" name = "FileToUpload" required>     </td>
</tr>

<tr>
	<td>&nbsp;</td>
	<td><input name="submit" type = "submit" name = "submit" value = "Add Product">
        <input name="clear" type = "reset" value = "Clear" >      </td>
</tr>
</table>

</form>
</center>
</body>
</html>
<?php
include ('server.php');
if(isset($_POST['submit']))
{

$c = $_POST["cat"];
$q = $_POST["qty"];
$s = $_POST["sqty"];
$m = $_POST["mqty"];
$l = $_POST["lqty"];
$itemname= $_POST["name"];
$price = $_POST["price"];
$seller=$_POST['seller'];
$image=$_POST["image"];
$d=$_POST["desc"];
   
$tf = $path.basename($_FILES['FileToUpload']['name']);

$np = "/f/images/".$tf;

  $query = "INSERT INTO product( pname, price, seller,tqty, description, imgsrc,category,sqty,mqty,lqty) VALUES
  ( '".$itemname."', '".$price."', '".$seller."','".$q."', '".$d."', '".$np."','".$c."','".$s."','".$m."','".$l."')";
$success=mysqli_query($db,$query);
if($success)
{
echo '
	<script type="text/javascript">
	alert("Product Added Successfully.");
	location="admin.html";
	</script>
			';
}


$flag = "";

if($_FILES['FileToUpload']['name'] != "" )
{
	$fileType = pathinfo($tf,PATHINFO_EXTENSION);

	$check = getimagesize($_FILES['FileToUpload']['tmp_name']);	

	if($check == true)
	{
		$flag = 1;
	}	

	else
	{
		echo "<h3> File is not an Image</h3>";
		$flag = 0;

	}

	if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif")
	{

		echo "<h3>This Type of File is Not allowed</h3>";
		$flag = 0;

		}		
	else
	{

		$flag = 1;

		}

	if(file_exists($tf))
	{

		echo "<h3>File is Already Exists.....!!!</h3>";
		$flag = 0;
		}
	else
	{
		$flag = 1;
		}

	if($flag == 1)
	{
		move_uploaded_file($_FILES['FileToUpload']['tmp_name'], $tf) or die( "");

		echo "<h3>Successfullly Product Added....!!!!</h3>";
		}
	else
	{

		echo "</br> <h3>Failed to Upload file....!!!!</h3>";

		}

}	

else
{
echo "<h3> No file Selected....<h3>";

}


	
mysqli_close($db);




}

?>


