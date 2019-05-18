<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>Admin Panel</title>
<link rel="stylesheet" href="style/style.css" media="all" />

<style>
	th,tr{border: 2px solid black;}
	table{border: 2px solid black;}
</style>
</head>
<body>
  <table align="center" width="794">
	<tr align="center">
		<td colspan="6"><h2>View All Products</h2></td>
	</tr>
	<tr>
		<th>Product ID</th>
		<th>Title</th>
		<th>Image</th>
		<th>Price</th>
		<th>Total Sold</th>
		<th>Status</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	
	<?php
			include("includes/db.php");
			
			//views all the products in the database
			$sql="select * from products";
			$res=mysqli_query($conn,$sql);
			$i=0;
			while($result=mysqli_fetch_array($res)){
					$p_id=$result['product_id'];
					$p_title=$result['product_title'];
					$p_img=$result['product_img'];
					$p_price=$result['product_price'];
					$status=$result['status'];
					
					$i++;
					
					
			
	?>

	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $p_title; ?></td>
		<td><img src="product_imgs/<?php echo $p_img; ?>" width="60" height="60"/></td>
		<td><?php echo $p_price; ?></td>
		<td>
			<?php
				$sql2="select * from pending_orders where product_id='$p_id'";
				$res2=mysqli_query($conn, $sql2);
				$count=mysqli_num_rows($res2);
				
				echo $count;
			?>
		</td>
		<td>
			<?php				
				echo $status;
			?>
		</td>
		<td><a href="index.php?edit_pro=<?php echo $p_id?>">Edit</a></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $p_id?>">Delete</a></td>
	
		
	</tr>
			<?php } ?>
  </table>
</body>
</html>