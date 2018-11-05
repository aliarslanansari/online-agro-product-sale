<?php
error_reporting(0);
	session_start();
$conn=mysqli_connect("localhost","root","","agro");
$pid=$_GET['pid'];
	$price=mysqli_fetch_row(mysqli_query($conn,"select price from products where id='$pid'"));
	$price=$price[0];
//	echo $price;	
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
<div class="column2" style="overflow-y: scroll; height:380px;">
		<form action="" method="post" enctype="multipart/form-data" >
<input type="hidden" id="price1" value='<?php echo $price; ?>' required readonly>
<h2 align="center">Enter Order Details</h2>
<h2 style='<?php if($_SESSION['uname']){echo "display:none;";} ?>' align='center'>Please, login to your account!</h2>
<table align="center" style='<?php if(!isset ($_SESSION['uname'])){echo "display:none;";}?>'>
<tr><td>Quantity(KGs):</td><td><input type="text" onchange="calprice()" value="<?php echo $_POST['quantity']; ?>"  name="quantity" id="quantity" required></td></tr>
<tr><td>Address:</td>
<td><textarea  name='address' rows='3' cols='30'><?php echo $_POST['address']; ?></textarea></td></tr>
<tr><td>Price(Rs.):</td><td><input type="text" id="price" value="<?php echo $_POST['price']; ?>"  name="price" required readonly></td></tr>
<tr ><td>Click To ORDER</td><td><input  type="submit" name="submit" onclick=\"return  confirm('do you want to delete Y/N')\" value="ORDER"/>
<?php
if(isset($_POST["submit"])){
	$quantity=$_POST['quantity'];
	$address=$_POST['address'];
//echo $address;
	$price=$_POST['price'];
	$uname=$_SESSION['uname'];
	$id=mysqli_fetch_row(mysqli_query($conn,"select max(id) from orders"));
	$id=$id[0]+1;
	echo $id[0];
	$pid=$_GET['pid'];
	$res=mysqli_fetch_row(mysqli_query($conn,"select RS,SS from products"));	
	$res[0]-=$quantity;
		$res[1]+=$quantity;
       $insert = mysqli_query($conn,"INSERT into orders VALUES ('$id','$uname','$address','$quantity','$price','$pid')");
        if($insert){
            echo "<br><br><tdd style='color:darkgreen'> Product Ordered Successfully.";
		mysqli_query($conn,"update products set RS='$res[0]', SS='$res[1]' where id='$pid'");
        }
	else
	{
            echo "Failed, please try again.";
        }
    }
?>
</td></tr>
</table>
    </form>
</div>
</div>
 <footer >
 <div  style="margin-left:150px">
	  <p  style="font-size:20px">Introduction to Web Technology Project by: Pooja Kelkar[SYIT-06] & Dhanshri Chaudhari[SYIT-03].</p></div>
</footer> 
</body>
<script>
	function calprice() {
	var p=document.getElementById("price1");
	var w=document.getElementById("quantity");
	var p1=document.getElementById("price");
	p1.value = p.value * w.value;
}
</script>
</html>
