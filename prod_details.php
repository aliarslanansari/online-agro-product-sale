<?php
error_reporting(0);
	session_start();
?>
<?php
$conn=mysqli_connect("localhost","root","","agro");
$id=$_GET['pid'];
//echo $id;
$result=mysqli_query($conn,"select * from products where id='$id';");
$row=mysqli_fetch_row($result);
$result1=mysqli_query($conn,"select * from users where uname='$row[7]';");
$row1=mysqli_fetch_row($result1);
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
	<?php
		echo "<table cellpadding='3px' align='center'><tr ><td colspan='2'><img width='300px' height='100px' src='data:image/jpeg;base64,".base64_encode($row[7])."'></td></tr>";
		echo "<tr colspan=2><td><b>Name:</td> <td>$row[1]</td></tr>";
		echo "<tr><td><b>Category:</td> <td>$row[2]</td></tr>";
		echo "<tr><td><b>Remaining Stock:</td> <td>$row[3]</td></tr>";
		echo "<tr><td><b>Price(&#8377;)/KG:</td> <td>$row[5]</td></tr>";
		echo "<tr><td style='padding-top: 1px 0;'><b>Description:</td> <td style='width:200px'>$row[6]</td></tr>";
	?>
<tr style='<?php if($_SESSION['uname']=='ADMIN'){echo "display:none;";}?>'><td>	<a href='order.php?pid=<?php echo $id?>'><button>ORDER NOW</button></a></td></tr>
</table>
</div>
</div> <footer >
 <div  style="margin-left:150px">
	  <p  style="font-size:20px">Introduction to Web Technology Project by: Pooja Kelkar[SYIT-06] & Dhanshri Chaudhari[SYIT-03].</p></div>
</footer> 
</body>
</html>
