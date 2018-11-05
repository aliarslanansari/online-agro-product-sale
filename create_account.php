<?php
error_reporting(0);
	session_start();
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

<div class="row"  style="margin-top:10px;width:100%">

 <div class="column3" style="overflow-y: scroll; height:380px;" ><table style="border-collapse: collapse; width:100%">
<tr><td><a href="index.php">Home</a><td></tr>
<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="insert_prod.php">Sell Product</a><td></tr>
<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="myprod.php">Edit Products</a><td></tr>
<tr ><td><a href="create_account.php">Create New Account</a></td></tr></table>
</div>
<div class="column2" style="overflow-y: scroll; height:385px;" >
<h1><p style='<?php if(!isset ($_SESSION['uname'])){ echo "display:none;"; } ?>' >Already logged in, Please logout to create a new account. </p></h1>
<div style='<?php if(isset ($_SESSION['uname'])){echo "display:none;";}?>' >
		<form action="" method="post" enctype="multipart/form-data" >
<h1 align="center">Enter Your Details</h1><table align="center">
<tr><td>Username:</td><td><input  type="text" name="uname" required></td></tr>
<tr><td>Password:</td><td><input type="password" name="password"required/></td></tr>
<tr><td>Name:</td><td><input type="text" name="name"required/></td></tr>
<tr><td>Mobile No:</td><td><input type="number" name="mob"required/></td></tr>
        <tr><td>Click To Submit</td><td><input type="submit" name="submit" value="SUBMIT"/></td></tr>
</table>
<?php
if(isset($_POST["submit"])){
 
	$uname=$_POST['uname'];
	$password=$_POST['password'];
	$name=$_POST['name'];
	$mob=$_POST['mob'];	
        
        //Insert image content into database
	$id=mysqli_fetch_row(mysqli_query($conn,"select max(id) from users"));
	$id=$id[0]+1;
		$username=mysqli_fetch_row(mysqli_query($conn,"select * from users where uname='$uname'"));
		if($username){ echo"<h3 style='color:red'>User Name already taken, try something other.</h3>";
		}
		else{
       $insert = mysqli_query($conn,"INSERT into users VALUES ('$id','$name','$uname','$password', '$mob')");
        if($insert){
            echo "<hj style='color:darkgreen'>Account Created Successfully.";
        }else{
            echo "Account Not Created!";
        } 
    }
}
?>
    </form></div></div></div>

 <footer >

 <div  style="margin-left:150px">

	  <p  style="font-size:20px">Introduction to Web Technology Project by: Pooja Kelkar[SYIT-06] & Dhanshri Chaudhari[SYIT-03].</p></div>

</footer> 

</body>

</html>
