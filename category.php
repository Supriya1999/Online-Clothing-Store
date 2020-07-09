<?php
session_start();
?>

<html>
<head>
<style>
.container {
    position: fixed;
    width: 100%;
    max-width: 400px;
}
/*
img {
  object-fit: cover;
  width:600px;
  height:600px;
}*/

.container img {
    height: 100%;
    position: fixed;
      background-color: white;
}
.container .btn {
    position: absolute;
    top: 500px;
    left: 350px;;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: white;
    color: salmon;
    font-size: 26px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
}
.container1 {
    position: fixed;
    right: 240px;
    width: 100%;
    max-width: 400px;
}
.container1 img1 {
    height: auto;
    position: fixed;
      background-color: white;
      left: 615px;
}
.container1 .btn1 {
    position: absolute;
    top: 500px;
    left: 75%;;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: white;
    color: #3399ff;
    font-size: 26px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
}
</style>
</head>
<body>

<div class="container">
  <img src="forwomen.jpg" width="650" height="700">
 <form method="post" action="wproduct.php">
  <button class="btn" onclick="wproduct.php"><b> FOR WOMEN </b></button>
 </form>
</div>

<div class="container1">
  <img src="formen.jpg" width="650" height="700">
 <form method="post" action="mproduct.php">
  <button class="btn1"><b> FOR MEN </b></button>
</form>
</div

</body>
</html>

