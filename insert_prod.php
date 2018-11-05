<?php
error_reporting(0);
	session_start();
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
</header><nav>
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
		<form action="" method="post" enctype="multipart/form-data" >
<h2 align="center">Enter Your Product Details</h2>
<h2 style='<?php if($_SESSION['uname']){echo "display:none;";} ?>' align='center'>Please, login to your account!</h2>
<table align="center" style='<?php if(!isset ($_SESSION['uname'])){echo "display:none;";}?>'>
<tr><td>Name:</td><td><input type="text" name="name" required></td></tr>
<tr><td>Category:</td><td><select name='cat'>
<option value="Cereal & Pulses" >Cereal & Pulses</option>
<option value="Seeds" >Seeds</option>
<option value="Spices" >Spices</option>
<option value="Fruits" >Fruits</option>
</select></td></tr>
<tr><td>Stock(KGs):</td><td><input type="text" name="weight" required></td></tr>
<tr><td>Price(Rs.):</td><td><input type="text" name="price" required></td></tr>
<tr><td>Description:</td><td><input type="text" name="desp"required/></td></tr>
        <tr><td>Select image to upload:</td><td>
        <input type="file" name="image"required/></td></tr>
	   
        <tr><td>Click To Submit</td><td><input type="submit" name="submit" value="SUBMIT"/>
<?php
if(isset($_POST["submit"])){
        $image = $_FILES['image']['tmp_name'];
	$name=$_POST['name'];
	$cat=$_POST['cat'];
	$weight=$_POST['weight'];
	$price=$_POST['price'];
	$desp=$_POST['desp'];
	$seller=$_SESSION['uname'];
        $imgContent = addslashes(file_get_contents($image));
        //Insert image content into database
	$id=mysqli_fetch_row(mysqli_query($conn,"select max(id) from products"));
	$id=$id[0]+1;
       $insert = mysqli_query($conn,"INSERT into products VALUES ('$id','$name','$cat','$weight','0','$price','$desp','$imgContent')");
        if($insert){
            echo "<tdd style='color:darkgreen'> Product Added Successfully.";
        }else{
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
</html>
