<?php
@session_start();
include("../includes/db.php");
include("../functions/functions.php");
cart();
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>My Shop</title>
<link rel="stylesheet" href="../style/style.css" media="all" />
</head>
<body>
 <div class="main_wrapper2">
	<div class="header_wrapper">
		<a href="index.php"><img src="../logo.png" style="float:left;"></a>
	</div>
	
	<div id="navbar">
		<ul id="menu">
			<li><a href="../index.php">Home</a></li>
			<li><a href="../all_products.php">All Products</a></li>
			<li><a href="#">My Account</a></li>
			<?php
				if(!isset($_SESSION['customer_email'])){
			?>
				<li><a href="../user_register.php">Sign Up</a></li>
			<?php
				}
			?>
			<li><a href="../cart.php">Shopping Cart</a></li>
			<li><a href="../contact.php">Contact Us</a></li>
		</ul>
		
		<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="Search"/>
				<input type="submit" name="search" value="Search"/>
			</form>
		</div>
	</div>
	
	<div class="content_wrapper">
		<div id="left_sidebar2">
			<div id="sidebar_title">Manage Account</div>
				<ul id="cats2">
				<?php
					$customer_email=$_SESSION['customer_email'];
					$sql="select * from customers where customer_email='$customer_email'";
					$result=mysqli_query($conn, $sql);
					$result_array=mysqli_fetch_array($result);
					$customer_img=$result_array['customer_img'];
					echo "<img src='customer_photos/$customer_img' width='180' height='180'/>";
					
				?>
					<li><a href="my_account.php?orders">Orders</a></li>
					<li><a href="my_account.php?edit">Edit</a></li>
					<li><a href="my_account.php?changepassword">Change Password</a></li>
					<li><a href="my_account.php?deleteaccount"?>Delete Account</a></li>
					<li><a href="signout.php">Sign out</a></li>
				</ul>
				
		</div>
		<div id="right_content2">
			<div id="headline">
				<div id="headline_content">
				<?php
				if(isset($_SESSION['customer_email'])){
					echo "<b>Welcome</b> <span style='color:skyblue;'>". $_SESSION['customer_email'] . "!</span>";
				}
				?>	
					&nbsp;
					<?php 
					if(!isset($_SESSION['customer_email'])){
						echo "<a href='checkout.php' style='color:#f93;'>Sign in</a>";
					}
					else{
						echo "<a href='signout.php' style='color:#f93;'>Sign out</a>";
					}
					?>
					</span>
				</div>
			</div>
			
			<div>
			<h3 style="background-color:grey; color:#fc9; text-align:center; padding:10px; line-height:40px;">Account Details</h3>
				<?php 
				getDefault();	
				
				if(isset($_GET['orders'])){
					include("orders.php");
				}
				if(isset($_GET['edit'])){
					include("edit.php");
				}
				if(isset($_GET['changepassword'])){
					include("change_pass.php");
				}
				if(isset($_GET['deleteaccount'])){
					include("delete_account.php");
				}
				
				?>
				
			</div>
		</div>
	</div>
	
	<div class="footer">
		<h1>&copy;2019 - By www.myshop.com</h1>
	</div>
	
 </div>

</body>
</html>