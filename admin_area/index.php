<?php
session_start();
			include("includes/db.php");
			
			//verifies if the admin is signed in
			if(!isset($_SESSION['admin_email'])){
				echo "<script>window.open('login.php', '_self')</script>";
			}
			else{
				
			
			
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>Admin Panel</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body>
 <div class="wrapper">
	 <div class="header">
	</div>
	
	<div class="right">
	<h2><center>Manage Account</center></h2>
		<a href="index.php?insert_product">Add Product</a>
		<a href="index.php?view_products">Products</a>
		<a href="index.php?view_customers">Customers</a>
		<a href="index.php?view_orders">Orders</a>
		<a href="index.php?stock">Increase Stock</a>
		<a href="index.php?sales">Report</a>
		<a href="index.php?logout">Sign out</a>
		
	</div>
	
	<div class="left">
	<?php
	include("includes/db.php");
	
	if(isset($_GET['insert_product'])){
		include("insert_product.php");
	}
	if(isset($_GET['view_products'])){
		include("view_products.php");
	}
	if(isset($_GET['view_customers'])){
		include("view_customers.php");
	}
	if(isset($_GET['view_orders'])){
		include("view_orders.php");
	}
	if(isset($_GET['logout'])){
		include("logout.php");
	}
	if(isset($_GET['stock'])){
		include("stock.php");
	}
	if(isset($_GET['sales'])){
		include("sales.php");
	}
	if(!isset($_GET['insert_product']) &&  !isset($_GET['view_products']) && !isset($_GET['view_customers']) && !isset($_GET['view_orders']) && isset($_GET['logout']) && isset($_GET['stock'])){
		include("insert_product.php");
	}
	
	?>
	</div>
 </div>

</body>
</html>

			<?php } ?>