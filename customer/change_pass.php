<form action="" method="post">
	<table width='500' align='center'>
		<tr align="center">
			<td colspan="4"><h2>Change Password</h2></td>
		</tr>
		<tr>
			<td align='right'>Current Password</td>
			<td><input type="password" name="old_pass" required /></td>
		</tr>
		<tr>
			<td align='right'>New Password</td>
			<td><input type="password" name="new_pass" required /></td>
		</tr>
		<tr>
			<td align='right'>New Password Again</td>
			<td><input type="password" name="new_pass_again" required /></td>
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
	
	//changes the password
	if(isset($_GET['change_pass'])){
					$old_pass=$_GET['old_pass'];
					$new_pass=$_GET['new_pass'];
					$new_pass_again=$_GET['new_pass_again'];
					
					$sql="select * from customers where customer_pass='$old_pass'";
					$result=mysqli_query($conn, $sql);
					
					$check_pass=mysqli_num_rows($result);
					
					if($check_pass==0){
						echo "<script>alert('Password not valid, try again!')</script>";
						exit();
					} 
					if($new_pass!=$new_pass_again){
						echo "<script>alert('Password not matched, try again!')</script>";
						exit();
					}
					else{
						$sql2="update customers set customer_pass='$new_pass' where customer_email='$c'";
					$result2=mysqli_query($conn, $sql2);
					
					echo "<script>alert('Password changed!')</script>";
					echo "<script>window.open('my_account.php', '_self')</script>";
					
					}
				}
?>