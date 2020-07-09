<?php include ('server.php');?>
<!DOCTYPE html>

<html>
<head>

<script type="text/javascript">
function createacc(form)
{
 if(form.username.value == "") {
      alert("Error: Username is empty!");
      form.username.focus();
      return false;
    }
 if(form.email.value == "") {
      alert("Error: Email is empty!");
      form.username.focus();
      return false;
    }
 if(form.password_1.value == "") {
      alert("Error: Password is empty!");
      form.username.focus();
      return false;
    }
 if(form.password_2.value == "") {
      alert("Error: Confirm Password is empty!");
      form.username.focus();
      return false;
    }
 if(form.password_1.value != form.password_2.value) {
      alert("Error: Confirm Password doesnot match!");
      form.username.focus();
      return false;
}
 return true; 
}
</script>

<style> 
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

div {
    
    width: 400px;
    border: 3px solid grey;
    padding: 25px;
    margin: 25px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
</style>
</head>
<body>

<center>
<div>
<h3><b>Create Account</b></h3>
	
  <form method="post" action="register.php" onsubmit="return createacc(this)">
	<?php include('errors.php'); ?>
  	
  	<center>
  	First Name:<br><input type="text" name="fname"><br><br>
  	Last Name:<br><input type="text" name="lname"><br><br>
  	Phone No:<br><input type="text" name="phone"><br><br>
  	Address:<br><input type="textbox" name="address"><br><br>
  	  Username:<br><input type="text" name="username"><br><br>
  	  Email:<br><input type="email" name="email"><br><br>
  	  Password:<br><input type="password" name="password_1"><br><br>
  	  Confirm Password:<br><input type="password" name="password_2"><br><br>
		<button class="button" type="submit" name="reg_user"  value="Create">Create	</button>					
	</center>
  	<p>
  		Already a member? <a href="login.html">Sign in</a>
  	</p>
  	
  </form>
  </div>
  </center>
</body>
</html>

<?php
include('server.php');

$errors=array();
if (isset($_POST['reg_user']))
	{
		$firstname= $_POST['fname'];
		$lastname = $_POST['lname'];
		$phoneno = $_POST['phone'];
		$address = $_POST['address'];
		$username =  $_POST['username'];
		$email =  $_POST['email'];
		$password =  $_POST['password_1'];
		
	  $usercheck = "SELECT * FROM users WHERE username='$username' OR LIMIT 1";
	  $result = mysqli_query($db, $usercheck);
	  $user = mysqli_fetch_assoc($result);
	  

	if ($user) 
	{
	    if ($user['username'] === $username)
	    {
	      array_push($errors, "Username already exists");
	    }
	    
	    if ($user['email'] === $email)
	    {
	      array_push($errors, "email already exists");
	    }
	}
	
	
		if (count($errors) == 0)
		{
	  	$query1= "INSERT INTO users(fname,lname,username,email,password,phone,address)VALUES('".$firstname."','".$lastname."','".$username."', '".$email."', '".$password."', '".$phoneno."', '".$address."')";
		
	  	$success=mysqli_query($db, $query1);
	  	if($success)
	  	{
	  		header("location:login.html");
	  		}
	  	else{
	  		$message = "Username/Email Already Exist, Please try something different";
			echo "<script type='text/javascript'>alert('$message');</script>";
			}
	  	
	}
	}
?>
