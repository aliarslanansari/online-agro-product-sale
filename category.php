<?php
error_reporting(0);
	session_start();
$cat=$_GET['cat'];
//echo $cat;
?>
<?php
$conn=mysqli_connect("localhost","root","","agro");
$result=mysqli_query($conn,"select * from products where category='$cat' order by id desc");
while($row1=mysqli_fetch_row($result))
{
  $row[]=$row1;
}
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
 <div class="column3" style="overflow-y: scroll; height:340px;" ><table style="border-collapse: collapse; width:100%">
<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="insert_prod.php">Sell Product</a><td></tr>
<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="myprod.php">Edit Products</a><td></tr>
</table>

</div>
<div class="column2" style="overflow-y: scroll; height:340px;">
		<table cellpadding="3" border="1" style="border-collapse: collapse;width:100%">
		<?php
		for($i=0;$i<count($row);$i+=3)
		{
		echo "<tr align='right'>";
			for($j=$i;$j<count($row)&&$j<$i+3;$j++){
			
		echo " <td> <img width='150px' height='150px' src='data:image/jpeg;base64,".base64_encode($row[$j][7])."'><b><div class='tdcss'><p align='left'>Name: ".$row[$j][1].", ".$row[$j][2]." </p><p align='left'>Price(&#8377;): ".$row[$j][5].".0, Weight(KG):".$row[$j][3]."</p><a href='prod_details.php?pid=".$row[$j][0]."'><button  class='button1' style='border-radius:12px'>View</button></a></div></td>
		";
	}	
echo "</tr>";
} ?>
</table>
</div>
</div>
 <footer >
 <div  style="margin-left:150px">
	  <p  style="font-size:20px">Introduction to Web Technology Project by: Pooja Kelkar[SYIT-06] & Dhanshri Chaudhari[SYIT-03].</p></div>
</footer> 
</body>
</html>
