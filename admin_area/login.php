<?php
			session_start();
			include("includes/db.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
<title>Admin Panel</title>
<link rel="stylesheet" href="" media="all" />
<style>
@import url('https://fonts.googleapis.com/css?family=Carrois+Gothic');

* {
  outline: none;
  margin: 0;
  padding: 0;
  font-family: Carrois Gothic;
  -ms-user-select: none;
  -moz-user-select: none;
  user-select: none;
  -webkit-user-select: none;
}

body {
  background-image: url('https://images.pexels.com/photos/5412/water-blue-ocean.jpg');
  background-size: cover;
  overflow: hidden;
}

div {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 300px;
  transform: translate(-50%, -50%);
}

input {
  padding: 2px 4px;
  width: calc(100% - 2.8%);
  height: 35px;
  border: none;
  cursor: default;
}

button {
  padding: 2px;
  width: 100%;
  background: CornflowerBlue;
  border: none;
  color: #FFFFFF;
  height: 35px;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius: 5px;
  transition: 1s;
  cursor: pointer;
}

button:hover {
  background-color: CadetBlue;
}

#ee {
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
}
</style>
</head>
<body>
<div>
  <form method="post">
  <input type="text" id="ee" name="admin_email" placeholder="Email" >
  <input type="password" id="pe" name="admin_pass" placeholder="Password" >
  <button type="submit" id="subb" name="login">Login</button> 
  </form>
  </div>

</body>
</html>

<?php
//sign in credentials
	if(isset($_POST['login'])){
		$user_email=$_POST['admin_email'];
		$user_pass=$_POST['admin_pass'];
		
		$sql="select * from admin where admin_email='$user_email' && admin_pass='$user_pass'";
		$res=mysqli_query($conn,$sql);
		
		$check_admin=mysqli_num_rows($res);
		
		if($check_admin==1){
			$_SESSION['admin_email']=$user_email;
			echo "<script>window.open('index.php?insert_product', '_self')</script>";
		}
		else{
			echo "<script>alert('Password or Email is incorrect')</script>";
		}
	}
?>