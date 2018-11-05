<?php
error_reporting(0);
	session_start();
	if($_SESSION['uname'])
	{
		header("Location:index.php");
	exit;
	}
?>
<?php
$conn=mysqli_connect("localhost","root","","agro");
?>
<html>
<head>
	<title>
	Online Agro Product Sale 
	</title>
	<link rel="stylesheet" href="css/styles.css">
	<style>
</style>
</head>
<body>
<header  style="height: 100px;background-color: #f4c433;">
	 <div class="row" style="width:100%">
		  <div class="column1">
				<h1 style="font-size: 30px;color:white;"> Online Agro Product Sale
		  </div>
		  <div class="column">
				<img style="width:100%;height: 90%; margin-top:2px;"  src="img/agroproducts.jpg" alt="Online Plot Selling & Buying" >
		  </div>

<div align='right' style='padding-top:5px;<?php if($_SESSION['uname']){echo "display:none;";}?>'><p><a href="login.php" ><button class='button1'>Login</button></a></p></div>
<div align='right' style='padding-top:5px;<?php if(!isset ($_SESSION['uname'])){echo "display:none;";}?>'><?php echo "<p style='color:WHITE'>Welcome, ".$_SESSION['uname']."	";  ?><a href="logout.php" ><button  class='button1'>Log Out</button></a></div>
	</div> 
</header>
<nav>
	<ul style="  position: absolute;width:98.8%;font-size:18px">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="create_account.php">Create New Account</a></li>
	</ul>
</nav>
<div class="row"  style="margin-top:50px;width:100%">
 <div class="column3" style="overflow-y: scroll; height:320px;" ><table style="border-collapse: collapse; width:100%">
<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="insert_prod.php">Sell Product</a><td></tr>
<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="myprod.php">Edit Products</a><td></tr>
</table>

</div>
<div class="column2" style="overflow-y: scroll; height:320px;">
		<form action="" method="post" enctype="multipart/form-data">
<h1 align="center">LOGIN TO YOUR ACCOUNT</h1><table align="center">
<tr><td>Username:</td><td><input type="text" name="uname" required></td></tr>
<tr><td>Password:</td><td><input type="password" name="password"required/></td></tr>
        <tr><td></td><td><input type="submit" name="LOGIN" value="LOGIN"/><?php
if(isset($_POST["LOGIN"])){
        $uname=$_POST['uname'];
        $password=$_POST['password'];
       $id=mysqli_fetch_row(mysqli_query($conn,"select * from users where uname='$uname' and password='$password';"));
        if(count($id)>0){
	if($uname=='ADMIN'){
			session_start();
	$_SESSION["uname"]=$uname;
	$_SESSION["password"]=$password;
	header("Location:admin.php");
	exit;
	}
else{
//            echo "<p style='color:darkgreen'>Login successfully.";
	session_start();
	$_SESSION["uname"]=$uname;
	$_SESSION["password"]=$password;
	header("Location:index.php");
	exit;
        }}else{
            echo "Wrong Username or Password, please try again.";
        } 
    }
?></td></tr>
</table>
    </form>
</div>
</div>
 <footer >
 <div  style="margin-left:150px">
	  <p  style="font-size:20px">Introduction to Web Technology Project by: Pooja Kelkar[SYIT-06] & Dhanshri Chaudhari[SYIT-03].</p></div>
</footer> 
</body>
</html>
