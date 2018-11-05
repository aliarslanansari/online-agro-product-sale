<?php
error_reporting(0);
	session_start();
?>
<?php
$conn=mysqli_connect("localhost","root","","agro");
$un=$_SESSION['uname'];
$result=mysqli_query($conn,"select orders.quantity, orders.price, orders.address, products.name, products.category,orders.id,orders.uname from orders,products where orders.prod_id = products.id");
$resultset=array();
while($row1=mysqli_fetch_row($result))
{
  $row[]=$row1;
}
//print_r($row)
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
<div align='right' style='padding-top:5px;<?php if(!isset ($_SESSION['uname'])){echo "display:none;";}?>'><?php echo "<p style='color:WHITE'>Welcome, ".$_SESSION['uname']."	";  ?>
<a href="logout.php" >
<button  class='button1'>Log Out</button></a></div>
	</div> 
</header>
	<nav>
		<ul style="  position: absolute;width:98.8%;font-size:18px">
		  <li><a href="index.php">Home</a></li>
		  <li><a href="create_account.php">Create New Account</a></li>
		</ul>
	</nav>
	<div class="row"  style="margin-top:50px;width:100%">
	 <div class="column3" style="overflow-y: scroll; height:320px;" >
<table style="border-collapse: collapse; width:100%">

	<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="insert_prod.php">Sell Product</a><td></tr>
	<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="orderr.php">Received Order</a><td></tr>
	<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="myprod.php">Edit Products</a><td></tr>
	</table>
	</div>
 <div class="column2" style="overflow-y: scroll; height:320px;">
<h2 style='<?php if($_SESSION['uname']){echo "display:none;";} ?>' align='center'>Please, login to your account!</h2>
<h2><b>ORDERS YOU RECEIVED:</b></h2>
		<table cellpadding="3" border="1" style="border-collapse: collapse;width:100%">
		<?php
		for($i=0;$i<count($row);$i+=3)
		{
		echo "<tr align='left'>";
			for($j=$i;$j<count($row)&&$j<$i+3;$j++){
			
		echo "<td>Name: ".$row[$j][3]."<br>Delivery Address: ".$row[$j][2]."<br> Quantity: ".$row[$j][0]."<br> Price(&#8377): ".$row[$j][1]."<br> Customer: ".$row[$j][6]."</p>
</a></div></td>";
	}	
echo "</tr>";
} ?> </table>
</div>
</div>
 <footer >
 <div  style="margin-left:150px">
	  <p  style="font-size:20px">Introduction to Web Technology Project by: Pooja Kelkar[SYIT-06] & Dhanshri Chaudhari[SYIT-03].</p></div>
</footer> 
</body>
</html>
