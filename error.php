<?php
@session_start();
include("includes/db.php");
include("functions/functions.php");
cart();
$error= "Added product is unavailable!";
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>My Shop</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body>
 <div class="main_wrapper">
	<div class="header_wrapper">
		<a href="index.php"><img src="images/header_banner03.png" style="float:left;"></a>
	
	</div>
	
	<div id="navbar">
		<ul id="menu">
			<li><a href="index.php">Home</a></li>
			<li><a href="all_products.php">All Products</a></li>
			<li><a href="customer_register.php">Sign Up</a></li>
			<li><a href="cart.php">Shopping Cart</a></li>
			<li><a href="contactus.php">Contact us</a></li>
		</ul>
		
		<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="Search"/>
				<input type="submit" name="search" value="Search"/>
			</form>
		</div>
	</div>
	
	<div class="content_wrapper">
		<div id="left_sidebar">
			<div id="sidebar_title">Categories</div>
				<ul id="cats">
				
				<?php getCategories(); ?>
				</ul>
				
			<div id="sidebar_title">Brands</div>
				<ul id="brands">
					<?php getBrands(); ?>
				</ul>
				
		</div>
		<div id="right_content">
			<div id="headline">
				<div id="headline_content">
				<?php
				if(!isset($_SESSION['customer_email'])){
					echo "<b>Welcome Guest!</b><b style='color:yellow;'>Shopping Cart</b>";
				}
				else{
					echo "<b>Welcome <span style='color:skyblue;'>". $_SESSION['customer_email'] . "!</span></b><b style='color:yellow;'> Shopping Cart</b>";
				}
					
					
				?>	
					
					<span> - Items: <?php items(); ?> - Price: <?php total_price();?>&nbsp;&nbsp;&nbsp;<a href="cart.php" style="color:#ff0;">Go to Cart</a>
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
			
			<div id="products_box">
				</br>
				<center><?php echo $error; ?></center>
				</br>
				<?php getProduct(); ?>
				<?php getCategoriesProduct(); ?>
				<?php getBrandsProduct(); ?>
			</div>
		</div>
	</div>
	
	<div class="footer">
		<h1>&copy;2019 - By www.myshop.com</h1>
	</div>
	
 </div>

</body>
</html>
?>