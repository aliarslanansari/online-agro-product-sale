<?php
	$conn=mysqli_connect("localhost","root","","agro");
	$id=$_GET['pid'];
	$result=mysqli_query($conn,"delete from products where id='$id'");
	header("Location:myprod.php");
	exit;
	?>

