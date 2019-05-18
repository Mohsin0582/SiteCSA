<?php
@session_start();
include("../includes/db.php");
//include("../functions/functions.php");



$c=$_SESSION['customer_email'];
	$sql="select * from customers where customer_email='$c'";
	$result=mysqli_query($conn, $sql);
	$result_array=mysqli_fetch_array($result);
	$customer_id=$result_array['customer_id'];
?>

<h3><center> Order Details</center></h3>
<table width="700" align="center">
	<tr>
		<th>Order Number</th>
		<th>Due Amount</th>
		<th>Invoice Number</th>
		<th>Total Products</th>
		<th>Order Date</th>
		<th>Paid/Unpaid</th>
		<th>Status</th>
	</tr>


<?php
//shows the list of pending customer orders
	$sql="select * from customer_orders where customer_id='$customer_id'";
	$result=mysqli_query($conn, $sql);
	$i=0; 
	
	while($rows_order=mysqli_fetch_array($result)){
		$order_id=$rows_order['order_id'];
		$due_amount=$rows_order['due_amount'];
		$invoice_no=$rows_order['invoice_no'];
		$products=$rows_order['total_products'];
		$date=$rows_order['order_date'];
		$status=$rows_order['order_status'];
		 $i++; 
		 
		 if($status=='Pending'){
			$status='Unpaid'; 
		 }
		 else{
			$status='Paid';
		 }
			 
		echo "
			<tr align='center'>
				<td>$i</td>
				<td>$due_amount</td>
				<td>$invoice_no</td>
				<td>$products</td>
				<td>$date</td>
				<td>$status</td>
				<td><a href='confirm.php?order_id=$order_id'>Confirm</a></td>
			</tr>
		";
	}
?>
</table>