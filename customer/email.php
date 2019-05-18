<?php
//this code works only when you put the file on the live server rather than a localhost
$to = "m.mohsin.shahzad0582@gmail.com";
$subject = "Stock Warning!";
$body =  "Please refill the stock \r\n" ;
$headers="MIME-VERSION: 1.0" . "\r\n";
$headers .="Content-type: text\html;charset=UTF-8". "\r\n";
$headers .= "From: <Stock Management>\r\n";

$send=mail($to,$subject,$body,$headers);

	if($send)
	{
		echo "<script>alert('Stock Email Sent!')</script>";
	}
?>