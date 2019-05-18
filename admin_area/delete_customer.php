<?php
			include("includes/db.php");
			
			if(isset($_GET['delete_c'])){
				$delete_c=$_GET['delete_c'];
			//Deletes the specific customer
			$sql="delete from customers where customer_id='$delete_c'";
			$res=mysqli_query($conn,$sql);
			if($res){
				echo "<script>alert('Customer Deleted!')</script>";
				echo "<script>window.open('index.php?view_customers', '_self')</script>";
			}
			
			}
			
?>