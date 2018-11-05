<?php
	$conn=mysqli_connect("localhost","root","","agro");
	$id=$_GET['pid'];
	$result=mysqli_query($conn,"delete from orders where id='$id'");
	header("Location:myorders.php");
	exit;
?>
