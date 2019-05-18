<?php
@session_start();
include("includes/db.php");
include("functions/functions.php");
cart();
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
				/*the following code checks if the user is logged in or not. If the user is not loggin in, the website greets you simply with 'Welcome Guest!'
				but if you are logged in it greets you with your email id e.g.  'Welcome robert@gmail.com!'
				*/
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
					// if the user is logged in it shows the 'Sign out' hyperlink otherwise it shows the 'Sign in' hyperlink
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
				<div style="margin-top:20px;">
				<form action="contactus.php" method="post" enctype="multipart/form-data" >
				</br>
				</br>
					<label>Name : </label>
					<input type="text" name="name" value="" />
					</br>
					</br>
					<label>Number : </label>
					<input type="text" name="number" value="" />
					</br>
					</br>
					<label>Message : </label>
					<textarea  rows="7" cols="50" name="message" /></textarea>
					</br>
					</br>
					<input type="submit" name="submit" value="Submit" />
					</br>
				</form>
			</div>
			</div>
		</div>
	</div>
	
	<div class="footer">
		<h1>&copy;2019 - By www.myshop.com</h1>
	</div>
	
 </div>

</body>
</html>

<?php 
	//email code works only when the website is placed on any server
	include("email.php"); 
?>