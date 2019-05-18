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
  <table align="center" width="760">
	<tr align="center">
		<td colspan="6"><h2>Sales Report</h2></td>
	</tr>
	<tr>
		<th>Number</th>
		<th>Product Title</th>
		<th>Quantity</th>
	</tr>
	
	<?php
			include("includes/db.php");
			//shows the sales report
			
			//selecting all the entries from the database sales table
			$sql="select * from sales";
			$res=mysqli_query($conn,$sql);
			
			//count the number of rows in the sales table
			$rows=mysqli_num_rows($res);
			
			//check if there is one or more records in the sales table
			if($rows>0){
				//if there is one or more records in the sales table, show the product title and quantity of the product sold
				$i=0;
				while($result=mysqli_fetch_array($res)){
						$product_title=$result['product_title'];
						$qty=$result['qty'];
						$i++;
							
	?>

	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $product_title; ?></td>
		<td><?php echo $qty; ?></td>	
	</tr>
			<?php }
			}
			else{
				    //show this message if there is no record
					echo "<td colspan='2'>Nothing to show in sales report</td>";
			}
			?>
  </table>
</body>
</html>