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
		<td colspan="6"><h2>All Orders</h2></td>
	</tr>
	<tr>
		<th>Order Number</th>
		<th>Customer ID</th>
		<th>Due Amount</th>
		<th>Invoice Number</th>
		<th>Order Date</th>
		<th>Order Status</th>
		<th>Remove</th>
	</tr>
	
	<?php
			include("includes/db.php");
			
			// view all the customer orders
			$sql="select * from customer_orders";
			$res=mysqli_query($conn,$sql);
			$i=0;
			while($result=mysqli_fetch_array($res)){
					$o_id=$result['order_id'];
					$c_id=$result['customer_id'];
					$due_amount=$result['due_amount'];
					$invoice_no=$result['invoice_no'];
					$order_date=$result['order_date'];
					$order_status=$result['order_status'];
					
					$i++;
					
					$sql2="select * from customers where customer_id='$c_id'";
					$res2=mysqli_query($conn,$sql2);
					$result2=mysqli_fetch_array($res2);
					$c_email=$result2['customer_email'];
					
					
			
	?>

	<tr align="center">
		<td><?php echo $i; ?></td>
		<td><?php echo $c_email; ?></td>
		<td><?php echo $due_amount; ?></td>
		<td><?php echo $invoice_no; ?></td>
		<td><?php echo $order_date; ?></td>
		<td><?php echo $order_status; ?></td>
		<td><a href="delete_order.php?delete_o=<?php echo $o_id?>">Delete</a></td>
	
		
	</tr>
			<?php } ?>
  </table>
</body>
</html>