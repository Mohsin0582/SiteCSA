<?php
include("../includes/db.php");
?>
<DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>Admin Add Product</title>

<!-- 
	textarea editor website
	https://www.tiny.cloud
-->

<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
 <form method="post" action="insert_product.php" enctype="multipart/form-data">
	<table width="700" align="center" border="1">
		<tr align="center">
			<td colspan="2"><h2>Insert New Product:</h2></td>
		</tr>
		<tr>
			<td><b>Product Title</b></td>
			<td><input type="text" name="product_title"></td>
		</tr>
		<tr>
			<td><b>Product Category</b></td>
			<td>
				<select name="product_cat">
					<option>Select a category</option>
					<?php
					$get_cats="select * from categories";
					$result= mysqli_query($conn, $get_cats);
					
					while($res = mysqli_fetch_array($result)){
						$cat_id=$res['cat_id'];
						$cat_title=$res['cat_title'];
						echo " <option value='$cat_id'>$cat_title</option> ";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><b>Product Brand</b></td>
			<td>
				<select name="product_brand">
					<option>Select a category</option>
					<?php
					$get_brands="select * from brands";
					$result= mysqli_query($conn, $get_brands);
					
					while($res = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$brand_id=$res['brand_id'];
						$brand_title=$res['brand_title'];
						echo " <option value='$brand_id'>$brand_title</option> ";
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><b>Product Image</b></td>
			<td><input type="file" name="product_img"></td>
		</tr>
		<tr>
			<td><b>Product Price</b></td>
			<td><input type="text" name="product_price"></td>
		</tr>
		<tr>
			<td><b>Product Description</b></td>
			<td><textarea name="product_desc" col="30" row="10"></textarea></td>
		</tr>
		<tr>
			<td><b>Product Stock</b></td>
			<td><input type="text" name="product_stock"></td>
		</tr>
		<tr>
			<td><b>Product Keywords</b></td>
			<td><input type="text" name="product_keywords"></td>
		</tr>
		<tr align="center">
			<td colspan="2"><input type="submit" name="insertProduct" value="Submit"></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php
//code for adding the new product
if(isset($_POST['insertProduct']))
{
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];
	$product_stock=$_POST['product_stock'];
	$status="on";
	
	$product_img=$_FILES['product_img']['name'];
	$img_tmp_name=$_FILES['product_img']['tmp_name'];
	
	if( $product_title =="" || $product_cat=="" || $product_brand=="" || $product_price=="" || $product_desc=="" || $product_keywords=="" || $product_img=="" || $product_stock=="" )
	{
		echo "<script>alert('Please fill all the fields!')</script>";
		exit();
	}
	else
	{
		move_uploaded_file($img_tmp_name , "product_imgs/$product_img");
		$date = date('Y-m-d H:i:s');
		
		$sql="INSERT INTO products ( cat_id, brand_id, date, product_title, product_img, product_price, product_desc, status, stock, keywords) 
		VALUES  ('$product_cat', '$product_brand', NOW(), '$product_title', '$product_img', '$product_price', '$product_desc', '$status', '$product_stock', '$product_keywords')";
		
		if (mysqli_query($conn, $sql)) {
			echo "<script>alert('Product inserted successfully!')</script>";
			echo "<script>window.open('index.php?insert_product','_self')</script>";
			
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	
}

?>