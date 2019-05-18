<?php
include("includes/db.php");
@session_start();
$email = $_SESSION['customer_email'];
?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>Payment Options</title>
<link rel="stylesheet" href="style/style.css" media="all" />
</head>
<body>
<?php
include("includes/db.php");
?>
<div align="center" style="padding:20px;">

<h2>Payment Options</h2>
<?php
//each customer has a specific ip address, so it checks if there is a user with this specific address or not

$sql="select * from customers where customer_email='$email'";
$result=mysqli_query($conn, $sql);
$customers=mysqli_fetch_array($result);
$customer_id=$customers['customer_id'];
?>


<b>Pay with</b>$nbsp; <a href="http:/www.paypal.com"><img src="" width="200" height="80"></a>
<b>Or <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline!</a></b>

<b>If you have selected "Pay Offline" option then please check your email or account to find the INVOICE NUMBER for your order</b>
</div>

</body>
</html>