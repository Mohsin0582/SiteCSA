<?php
session_start();
// signout

//the line of code destroys the cutomer session and sign out the customer
session_destroy();
 
echo "<script>window.open('../index.php','_self')</script>";

?>