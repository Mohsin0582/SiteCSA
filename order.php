<?php
include("includes/db.php");
include("functions/functions.php");
@session_start();
$email = $_SESSION['customer_email'];
//when signed in, the added products in the cart are ordered

//get the customer id 
if(isset($_GET['c_id'])){
	$customer_id=$_GET['c_id'];
}

$total=0;
		$ip_add=ipAddress();
		$qty=0;
		//each customer has a specific ip address, so it checks if there is a user with this specific address or not
			$sql="Select * from cart where ip_add='$ip_add'";
				$result=mysqli_query($conn, $sql);
				
				//By default status is pending
				$status='Pending';
				//Random value is associated to the invoice_no variable
				$invoice_no=mt_rand();
				
				//count the number of rows in the cart
				$count_products = mysqli_num_rows($result);
				
				//go through each row
				while ($res=mysqli_fetch_array($result)){
					
					$product_id=$res['product_id'];		
					$qty=$res['qty'];		
					
					//select the product whose id  matches with the products product id
					$sql2="Select * from products where product_id='$product_id'";
					$result2=mysqli_query($conn, $sql2);
					
					//go through each row
					while($res2=mysqli_fetch_array($result2))
					{
						//check the quantity of the product
						if($qty>1){
							//if the quantity of the product is greater than 1, multiply the product price with the quantity and the store the result in the product_price array
							$res2['product_price']= $res2['product_price'] * $qty;
							$product_price=array($res2['product_price']);
						}
						else{
							$product_price=array($res2['product_price']);
						}
						//sum the values in the array to get the total
						$values=array_sum($product_price);
						$total += $values;
					}
				}
				
				//select all the records of the table cart
				$sql2="Select * from cart";
				$result2=mysqli_query($conn, $sql2);
				$result_array=mysqli_fetch_array($result2);
				$qty=$result_array['qty'];
				
				$subtotal=0;
				if($qty==0){
					$qty=1;
					$subtotal=$total;
				}
				else{
					$qty=$qty;
					$subtotal=$total * $qty;
				}
				
				//enter the values in the customer_orders table
				$sql3="insert into customer_orders(customer_id, due_amount, invoice_no, total_products, order_date, order_status)
						values('$customer_id','$sub_total','$invoice_no','$count_products', NOW(),'$status')";
						
				$result3=mysqli_query($conn, $sql3);
				
				//check if values are entered successfully or not
				if($result3){
					//if values are entered successfully or not
				echo "<script>alert('Order Submitted Successfully!')</script>";
				echo "<script>window.open('customer/my_account.php', '_self')</script>";
				
				//each customer has a specific ip address, so it checks if there is a user with this specific address or not
				$sql9="Select * from cart where ip_add='$ip_add'";
				$result9=mysqli_query($conn, $sql9);
				
				    //go through each record
					while ($res9=mysqli_fetch_array($result9)){
						$product_id=$res9['product_id'];		
						$qty=$res9['qty'];		
						
						//insert the vlaues in the pending_orders table as well
						$sql5="insert into pending_orders(customer_id, invoice_no, product_id, qty, order_status)
						values('$customer_id', '$invoice_no', '$product_id', '$qty', '$status')";
						$result5=mysqli_query($conn, $sql5);
						
						//after inserting the values, empty the cart for further processing
						$sql4="delete from cart where ip_add=$ip_add";
						$result4=mysqli_query($conn, $sql4);
					}
				}
					
				
?>