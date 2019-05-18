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
  <table align="center" width="794">
	<tr align="center">
		<td colspan="6"><h2>View All Customers</h2></td>
	</tr>
	<tr>
		<th>Serial Number</th>
		<th>Name</th>
		<th>Email</th>
		<th>Image</th>
		<th>Country</th>
		<th>Remove</th>
	</tr>
	
	<?php
			include("includes/db.php");
			
			//view all the customer accounts
			$sql="select * from customers";
			$res=mysqli_query($conn,$sql);
			$i=0;
			while($result=mysqli_fetch_array($res)){
					$c_id=$result['customer_id'];
					$c_name=$result['customer_name'];
					$c_email=$result['customer_email'];
					$c_img=$result['customer_img'];
					$c_country=$result['customer_country'];
					
					$i++;
					
					
			
	?>

	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $c_name; ?></td>
		<td><?php echo $c_email; ?></td>
		<td><img src="../customer/customer_photos/<?php echo $c_img; ?>" width="60" height="60"/></td>
		<td><?php echo $c_country; ?></td>

		<td><a href="delete_customer.php?delete_c=<?php echo $c_id?>">Delete</a></td>
	
		
	</tr>
			<?php } ?>
  </table>
</body>
</html>