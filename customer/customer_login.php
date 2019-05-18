<?php
	$conn = mysqli_connect("localhost", "root", "", "myshop");
	//include('./functions/functions.php');
	
	//session is started if the customer is logged in
	@session_start();
	
?>
<div>
	<form method="post" action="./checkout.php">
	</br>
		<table bgcolor="#66cccc" width="700" align='center'>
		</br>
			<tr align="center"></br>
				<td colspan="4"><h3>Login or Register</h3></td>
			</tr>
			<tr>
				<td align="right">Email:</td>
				<td><input type="text" name="c_email"></td>
			</tr>
			<tr>
				<td align="right">Password:</td>
				<td><input type="password" name="c_pass"></td>
			</tr>
			<tr align="center">
				<td colspan="4"><input type="submit" name="c_login" value="Login"></td>
			</tr>
			<tr>
				<td align="left"><a href="forgot_password.php" >Forgot Password!</a></td>
				<td align="right"><a href="customer_register.php" >Register Now!</a></td>
			</tr>
		</table>
	</form>
</div>

<?php
//verifies the sign in credentials

//check if the login button is clicked or not 
	if(isset($_POST['c_login'])){
		//if the login button is clicked
		
		//get the input values of the email and password fields
		$email=$_POST['c_email'];
		$pass=$_POST['c_pass'];
		
		//select the customer with the entered email and password
		$sql="select * from customers where customer_email='$email' && customer_pass='$pass'";
		$result=mysqli_query($conn, $sql);
		$row=mysqli_num_rows($result);
		
		//each customer has unique ip address, get that ip address
		$ip_add=ipAddress();
		
		//select all the items added in the cart using the id address
		$sql2="select * from cart where ip_add='$ip_add'";
		$result2=mysqli_query($conn, $sql2);
		$row2=mysqli_num_rows($result2);
		
		//check if there exists a customer with the entered email and password 
		if($row==0){
			//if there exists no customer with the entered email and password then show this message and exit stoping the rest of the code executions
			echo "<script>alert('Email or password is wrong!')</script>";
			exit();
		}
		
		//if there is no registerd customer and no item is added in the cart, take the customer to the login page
		if($row==0 && $row2==0){
			echo "<script>window.open('customer/customer_login.php', '_self')</script>";
		}
		else{
			//if there is registerd customer and items are added in the cart, start the session and take the customer to the payment options page
			$_SESSION['customer_email']=$email;
			include("payment_options.php");
		}		
}
?>