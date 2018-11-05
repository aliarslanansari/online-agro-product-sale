<?php
	session_start();
	echo $_SESSION['uname'];
	session_unset();
	session_destroy(); 
	header("Location:index.php");
	exit;
?>
