<?php
if (isset($_POST['submit']) && isset($_POST['name']) && isset($_POST['number']) && isset($_POST['message']) ){

$name=$_POST['name'];
$number=$_POST['number'];
$message=$_POST['message'];

$to = "m.mohsin.shahzad0582@gmail.com";
$subject = "Received Mail From '$name'";
$body =  "Full Name = " . $name . "\r\n" . "Number = " .$number . "\r\n" . "Message = " .$message . "\r\n" ;
$headers="MIME-VERSION: 1.0" . "\r\n";
$headers .="Content-type: text\html;charset=UTF-8". "\r\n";
$headers .= "From: <$name>\r\n";

$send=mail($to,$subject,$body,$headers);

	if($send)
	{
		header("Location: contactus.php");
	}else{
		header("Location: index.php");
	}
}
?>