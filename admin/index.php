<?php
ob_start();
session_start();
require("../config/connect.php");
error_reporting(0);
if(isset($_SESSION['admin'])){
	$username = $_SESSION['admin'] ;
echo "<script>window.location='admin.php';</script>";
}else{
?>
<!DOCTYPE html>
<html>
<title>BEM STMIK JAKARTA STI&K</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css/w3.css">
<link rel="stylesheet" href="../assets/css/snorkel-blue.css">
<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<body>

<div class="w3-container w3-content w3-center w3-padding-24" style="max-width:600px; min-height:500px;">    
	
	<div class="w3-card-4 w3-center" style="margin-top:60px;">
	<h1 class="w3-theme-l1 w3-padding-16">Admin Login</h1>
	<form class="w3-container" action="index.php?action=login" method="post">

	  <label class="w3-text-l1"><b>Username</b></label>
	  <input class="w3-input w3-border w3-light-grey" type="text" name="username">

	  <label class="w3-text-l1"><b>password</b></label>
	  <input class="w3-input w3-border w3-light-grey" type="password" name="password">

	  <button class="w3-btn w3-theme-l1 w3-margin">Register</button>

	</form>
	</div>

</div>

<!-- Footer -->
<footer class="w3-center w3-theme-d5 w3-padding-16">
  <p>BEM STMIK JAKARTA STI&K &copy; 2023</p>
</footer>
 
<!-- Add Google Maps -->

</body>
</html>
<?php
}
?>
<?php
if($_GET[action] == 'login'){
$username = trim(strip_tags($_POST[username])) ;
$password1 = trim(strip_tags($_POST[password])) ;

$password = md5($password1) ;
$cek_member = $db->query("select count(*) from admin where username='$username' and password='$password'") ;
if($cek_member->fetchColumn() == 1){
	session_start();
	$_SESSION['admin'] = $username ; 
		echo "<script>window.location ='admin.php'</script>";
	}else{
		echo "<script>alert ('Wrong Username/Password '); </script>";
		echo "<script>window.location='index.php'</script>";
	}
}
?>