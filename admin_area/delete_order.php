<?php
			include("includes/db.php");
			
			//delete the specific customer
			if(isset($_GET['delete_o'])){
				$delete_o=$_GET['delete_o'];
			
			$sql="delete from customer_orders where order_id='$delete_o'";
			$res=mysqli_query($conn,$sql);
			if($res){
				echo "<script>alert('Order Deleted!')</script>";
				echo "<script>window.open('index.php?view_orders', '_self')</script>";
			}
			
			}
			
?>