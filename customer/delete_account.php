<form action="" method="post">
	<table width='600' align='center'>
		<tr align="center">
			<td colspan="2"><h2>Delete Account!</h2></td>
		</tr>
		<tr align="center">
			<td><input type="submit" name="yes" value="Yes, I want"/></td>
			<td><input type="submit" name="no" value="No, I do not"/></td>
		</tr>
		<tr align="center">
			<td  colspan="4"><input type="submit" name="change_pass" value="Change Password" /></td>
		</tr>
	</table>
</form>

<?php
	@session_start();
	include("../includes/db.php");
	//include("../functions/functions.php");
	
	$c=$_SESSION['customer_email'];
	// deletes the user account after confirming whether yes button is clicked or not
	if(isset($_POST['yes'])){
					$new_pass_again=$_GET['new_pass_again'];
					
					$sql="delete from customers where customer_pass='$c'";
					$result=mysqli_query($conn, $sql);
					
					
					if($result){
						session_destroy();
						echo "<script>alert('Account Deleted!')</script>";
						echo "<script>window.open('../index.php', '_self')</script>";
					} 
					}
					
	if(isset($_POST['no'])){
					echo "<script>window.open('my_account.php', '_self')</script>";
					}
					
					
		
?>