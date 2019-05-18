<?php
include("includes/db.php");

//increases stock 

//check if update button is clicked or not
	if(isset($_POST['update'])){
		//if update button is clicked
		
		//get the product id of the product whose stock quantity is increased
		$product_id=$_POST['product_id'];
		//get the stock quantity of the product to be increased
		$stock=$_POST['stock'];
		
					//selecting all the entries from the database products table
					$sql="select * from products";
				    $result=mysqli_query($conn, $sql);
								//count the number of rows in the products table
								$count= mysqli_num_rows($result);
								//check if there is one or more records in the products table
								if($count>0){
									//if there is one or more records in the products table
									//go through each product in the products table
								for($i=0;$i<$count;$i++){
									//select the product whose id matches with the product id whose quantity needs to be increased 
						$sql3="Select * from products where product_id='$product_id[$i]'";
						$result3=mysqli_query($conn, $sql3);
						//check if we get the matched id products
						if($result3){
						         //then increase the stock quantity of that product 
								$sql2="update products set stock='$stock[$i]' where product_id='$product_id[$i]'";
								$result2=mysqli_query($conn, $sql2);
						}
					}
	}
	}
	
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>Admin Panel</title>
<link rel="stylesheet" href="style/style.css" media="all" />

<style>
	th,tr{border: 2px solid black; }
	table{border: 2px solid black;}
</style>
</head>
<body>
<form method="post" action="index.php?stock" enctype="mutipart/form-data">
  <table align="center" width="760">
	<tr align="center">
		<td colspan="6"><h2>Increase Stock</h2></td>
	</tr>
	<tr>
		<th>Number</th>
		<th>Product</th>
		<th>Stock</th>
		<th>Action</th>
	</tr>
	
	<?php
			include("includes/db.php");
			//shows the records
			
			//selecting all the entries from the database products table
			$sql="select * from products";
			$res=mysqli_query($conn,$sql);
			
			//count the number of rows in the products table
			$rows=mysqli_num_rows($res);
			
			//check if there is one or more records in the products table
			if($rows>0){
				//if there is one or more records in the products table, then show all the records in the products table
				$i=0;
				while($result=mysqli_fetch_array($res)){
						$product_id=$result['product_id'];
						$product_title=$result['product_title'];
						$product_stock=$result['stock'];
						$i++;
							
	?>

	<tr align="center">
	    <td><input type="hidden" name="product_id[]" value="<?php echo $product_id; ?>" ></td>
		<td><?php echo $i; ?></td>
		<td><?php echo $product_title; ?></td>
		<td><input type="text" name="stock[]" value="<?php echo $product_stock; ?>" /></td>	
		<td><input type="submit" name="update" value='Update' /></td>	
	</tr>
			<?php }
			}
			else{
					//show this message if there is no record
					echo "<td colspan='2'>No Product</td>";
			}
			?>
  </table>
  </form>
</body>
</html>