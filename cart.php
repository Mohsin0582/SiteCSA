<?php
@session_start();
include("includes/db.php");
include("functions/functions.php");
cart();
echo @$removeItem = removeItemFromCart();
$product_unavailable=array();
$counter=0;

/*
	checks if the quantity of the product is more than the stock or not, if the quantity is less than the stock then updates the value accordingly
*/
if(isset($_POST['update'])){
	$product_id=$_POST['product_id'];
	
						$qty=$_POST['qty'];
						$product_unavailable=array();
						
					$sql="select * from cart";
								$result=mysqli_query($conn, $sql);
								$count= mysqli_num_rows($result);
						
					for($i=0;$i<$count;$i++){
						$sql3="Select * from products where product_id='$product_id[$i]'";
						$result3=mysqli_query($conn, $sql3);
						$result3_array=mysqli_fetch_array($result3);
						$result3_name=$result3_array['product_title'];
						$result3_stock=$result3_array['stock'];
						
						if($qty[$i]<=$result3_stock){
						
								$sql2="update cart set qty='$qty[$i]' where product_id='$product_id[$i]'";
								$result2=mysqli_query($conn, $sql2);
							}
							else{
								$product_unavailable[$counter]=$result3_name;
								$counter++;
							}
					}
}
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
					echo "<b>Welcome <span style='color:skyblue;'>". $_SESSION['customer_email'] . "!</span></b><b style='color:yellow;'>Shopping Cart</b>";
				}
					
					
				?>	
					<span> - Items: <?php items(); ?> - Price: <?php total_price();?>&nbsp;&nbsp;&nbsp;<a href="index.php" style="color:#ff0;">Back</a>
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
				<form action="cart.php" method="post" enctype="mutipart/form-data">
			</br>
					<table width="740" align="center" bgcolor="#0099cc">
						</br>
						<tr></br>
							<td colspan="4">
								<?php 
								if($counter>0){
									for($j=0; $j<count($product_unavailable); $j++){
										echo "This much stock of '" . $product_unavailable[$j] ."' is unavailable!</br>";
									}
								}
									echo "</br>";
								?></td>
						</tr>
						<tr></br>
							<td>Remove</td>
							<td>Product</td>
							<td>Quantity</td>
							<td>Price</td>
						</tr>
					
					<?php 
					/*
						Shows all the products in the cart
					*/
					global $conn;
								$ip_add=ipAddress();
		
			$sql="Select * from cart where ip_add='$ip_add'";
				$result=mysqli_query($conn, $sql);
				while ($res=mysqli_fetch_array($result)){
					$product_id=$res['product_id'];		
					$qty=$res['qty'];		
					
					$sql2="Select * from products where product_id='$product_id'";
					$result2=mysqli_query($conn, $sql2);
					
					while($res2=mysqli_fetch_array($result2))
					{
						$product_price=$res2['product_price'];
						$product_img=$res2['product_img'];
						$product_title=$res2['product_title'];
						?>
						<tr>
							<td><input type="hidden" name="product_id[]" value="<?php echo $product_id ?>" ></td>
							<td><input type='checkbox' name="remove[]" value="<?php echo $product_id ?>" /></td>
							<td><?php echo $product_title?></br><img src="admin_area/product_imgs/<?php echo $product_img; ?>" height="80" width="80" </td>
							<td><input type="text" name="qty[]" value="<?php echo $qty ?>" size="3"></td>
							<td><?php echo "$". $product_price; ?></td>
						</tr>
					<?php 
					
								//echo $qty;
							}
						}
					?>
					
					<tr align="right">
						<td colspan="4">Total Price:</td>
						<td><?php total_price();
						?></td>
					</tr>
					<tr></tr>
					<tr >
						<td colspan="2"><input type="submit" name="update" value="Update"></td>
						<td><a href="index.php" style="text-decoration:none;"><input type="button" name="continue" value="Continue Shopping"></a></td>
						<td><a href="checkout.php" style="text-decoration:none;"><input type="button" value="Checkout" /></a></td>
					</tr>
					
					</table>
				
				</form>
			</div>
		</div>
	</div>
	
	<div class="footer">
		<h1>&copy;2019 - By www.myshop.com</h1>
	</div>
	
 </div>

</body>
</html>