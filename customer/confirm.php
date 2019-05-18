<?php
	@session_start();
	include("../includes/db.php");
	include("../functions/functions.php");

	//checks the order id, if the id is valid takes the payment details otherwise takes you again to the customer account page
	if(isset($_GET['order_id'])){
					$order_id=$_GET['order_id'];
				}
				else{
					echo "<script>window.open('my_account.php','_self')</script>";
				}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>My Shop</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body bgcolor="">
<form action="confirm.php?order_id=<?php echo $order_id; ?>" method="get" enctype="multipart/form-data">
	<table width="500" align="center" border="2" bgcolor="#cccccc">
		<tr align="center">
			<td colspan="5"><h2>Confirm Payment</h2></td>
		</tr>
		<tr>
			<td><input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>" /></td>
		</tr>
		<tr>
			<td>Invoice Number:</td>
			<td><input type="text" name="invoice_no"/></td>
		</tr>
		<tr>
			<td>Amount Sent:</td>
			<td><input type="text" name="amount"/></td>
		</tr>
		<tr>
			<td>Payment Mode:</td>
			<td>
				<select name="payment_method"/>
					<option>Select Payment</option>
					<option>Bank Transfer</option>
					<option>Easy Paisa / UBL Omni</option>
					<option>Western Union</option>
					<option>Paypal</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Transaction/Reference ID:</td>
			<td><input type="text" name="tr"/></td>
		</tr>
		<tr>
			<td>Easypaisa/UBL Omni code:</td>
			<td><input type="text" name="code"/></td>
		</tr>
		<tr align="center">
			<td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"/></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php 
//confirm payment component

//check if confirm hyperlink is clicked or not
				if(isset($_GET['confirm'])){
					//if confirm hyperlink is clicked or not
					
					//get all the field values
					$invoice=$_GET['invoice_no'];
					$amount=$_GET['amount'];
					$payment=$_GET['payment_method'];
					$ref_no=$_GET['tr'];
					$code=$_GET['code'];
					
					//Assuming each customer has 50000 balance, check if amount entered is less than or equal to 50000
					if($amount<=50000){
					//insert into payment table all the field values
					$sql="insert into payments (invoice_no, amount, payment_mode, ref_no, code, payment_date)
							values('$invoice','$amount','$payment','$ref_no','$code', NOW())";
					$result=mysqli_query($conn, $sql);
					
					//check if field values are inserted or not
					if($result){
						//if field values are inserted, show this message
						echo "<h2 style='text-align:center; color white;'>Payment Received, Your order will be completed in 24 hours!</h2>";
					} 
					else{
						//if field values are not inserted, go to the customer account page
						echo "<script>window.open('my_account.php','_self')</script>";
					}
					}
					else{
						//if amount is less than 50000, go to the customer account page
						echo "<script>window.open('my_account.php','_self')</script>";
					}
					
					//if payment is received update the order status to complete
					$update_order="update customer_orders set order_status='Complete' where order_id='$order_id'";
					$run_result=mysqli_query($conn, $update_order);
				
				//select the record from the pending_orders with the specific invoice number of the completed order
					$sql3="Select * from pending_orders where invoice_no='$invoice'";
						$result3=mysqli_query($conn, $sql3);
						$result3_array=mysqli_fetch_array($result3);
						
						//select the product id and quantity fields from the pending_orders
						$result3_product=$result3_array['product_id'];
						$result3_product_qty=$result3_array['qty'];
								
								//select the product whose id  matches with the pending_orders product id
							$sql4="Select * from products where product_id='$result3_product'";
						$result4=mysqli_query($conn, $sql4);
						$result4_array=mysqli_fetch_array($result4);
						
						//select the title and quantity of that product
						$result4_product_title=$result4_array['product_title'];	
						$result4_stock=$result4_array['stock'];	
						
						//reduce the product quantity by minus the product quantity of the product whose status is completed
							$stock=$result4_stock - $result3_product_qty;
							
							//update the product quantity in the products table
							$sql5="update products set stock='$stock' where product_id='$result3_product'";
						$result5=mysqli_query($conn, $sql5);
						
						//check if the product quantity reaches the 0 threshold or below
						if($stock <=0){
								//if the product quantity reaches the 0 threshold or below, send an email, this features works only if the server is online
							include("email.php");
						}
						
						//select the product in the sales table with specific product title whose order is completed
						$sql6="Select * from sales where product_title='$result4_product_title'";
						$result6=mysqli_query($conn, $sql6);
						
						if($result6){
							$result6_array=mysqli_fetch_array($result6);
							$result6_qty=$result6_array['qty'];
							
							//add the quantity of product with complete status in the previous quantity of that product in the sales table
							$result3_product_qty=$result3_product_qty+$result6_qty;
							
							//insert the new total quantity into table
							$sql7="insert into sales (product_title, qty)
							values('$result4_product_title','$result3_product_qty')";
						$result7=mysqli_query($conn, $sql7);
						}
						
						//delete the record of the product from the pending_oders whose order status is complete
						$sql8="delete from pending_orders where invoice_no='$invoice'";
						$result8=mysqli_query($conn, $sql8);
						
				}
				
?>