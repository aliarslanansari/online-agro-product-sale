<?php
$conn=mysqli_connect("localhost","root","","agro");
error_reporting(0);
	session_start();
$id=$_GET['pid'];
$result=mysqli_query($conn,"select * from products where id='$id';");
$row=mysqli_fetch_row($result);
//print_r($row);
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
<div class="row"  style="margin-top:10px;width:100%">
 <div class="column3" style="overflow-y: scroll; height:380px;" ><table style="border-collapse: collapse; width:100%">
<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="insert_prod.php">Sell Product</a><td></tr>
<tr style='<?php if($_SESSION['uname']!='ADMIN'){echo "display:none;";}?>'><td><a href="myprod.php">Edit Products</a><td></tr>
</table>

</div>
<div class="column2" style="overflow-y: scroll; height:380px;">
		<form action="" method="post" enctype="multipart/form-data" >
<h2 align="center">Edit Plot Details</h2>
<h2 style='<?php if($_SESSION['uname']){echo "display:none;";} ?>' align='center'>Please, login to your account!</h2>
<table align="center">
<tr><td>Name:</td><td><input type="text" value="<?php echo $row[1]; ?>" name="name" required></td></tr>
<tr><td>Category:</td><td><input type="text" name="cat"  value="<?php echo $row[2]; ?>" required></td></tr>
<tr><td>Present Stock:</td><td><input type="text" name="weight"  value="<?php echo $row[3]; ?>" required></td></tr>
<tr><td>Price(Rs.):</td><td><input type="number"  value="<?php echo $row[5]; ?>" name="price"required/></td></tr>
<tr><td>Description: </td><td><input type="text"  value="<?php echo $row[6]; ?>" name="desp"required/></td></tr>
        <tr><td>Select image to upload:</td><td>
       <img width='100px' height='100px' src='<?php echo "data:image/jpeg;base64,".base64_encode($row[7]); ?>'> <input type="file"  name="image"required/></td></tr>
	   
        <tr><td>Click To Submit</td><td><input type="submit" name="submit" value="SUBMIT"/>
<?php
if(isset($_POST["submit"])){
        $image = $_FILES['image']['tmp_name'];
	$name=$_POST['name'];
	$cat=$_POST['cat'];
	$weight=$_POST['weight'];
	$price=$_POST['price'];
	$desp=$_POST['desp'];
	$uname=$_SESSION['uname'];
        $imgContent = addslashes(file_get_contents($image));
        //Insert image content into database
       $insert = mysqli_query($conn,"UPDATE products SET name = '$name',category='$cat',RS='$weight',price='$price',img='$imgContent',desp='$desp' WHERE id = '$id';");
        if($insert){
            echo "<tdd style='color:darkgreen'> Plot details updated successfully.";
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
