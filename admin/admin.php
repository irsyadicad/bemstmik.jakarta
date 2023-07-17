<?php
ob_start();
session_start();
require_once ("config/control_index.php");
require("../config/connect.php");
//error_reporting(0);
if(!($_SESSION['admin'])){
echo "<script>window.location='index.php';</script>";
}else{
	$username = $_SESSION['admin'] ;
	$sqla = $db->query("select * from admin where username='$username'");
		while ($ra = $sqla->fetch(PDO::FETCH_LAZY)){
      $nickname = ucfirst($ra['nickname']);

?>
<!DOCTYPE html>
<html>
<title>Admin Bem</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../assets/css/w3.css">
<link rel="stylesheet" href="../assets/css/admin.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
<script src="../ckeditor/ckeditor.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px; margin-top:-16px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../assets/img/img_avatar1.png" class="w3-circle w3-margin-right" style="width:72px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $nickname ?></strong></span><br>
      <span><i class="fa fa-user fa-fw"></i> <?php echo $ra['jabatan']; ?></span>
	  <hr>
	  <a href="admin.php?action=logout"class="w3-link"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="admin.php" class="w3-bar-item w3-button w3-padding <?php if (!($_GET[page])){echo"w3-blue";}?>"><i class="fa fa-dashboard fa-fw"></i>  Dasboard</a>
    <a href="admin.php?page=profil" class="w3-bar-item w3-button w3-padding <?php if($_GET[page] == 'profil'){echo"w3-blue";}?>"><i class="fa fa-bank fa-fw"></i>  Profil</a>
    <a href="admin.php?page=berita" class="w3-bar-item w3-button w3-padding <?php if($_GET[page] == 'berita'){echo"w3-blue";}?>"><i class="fa fa-newspaper-o fa-fw"></i>  Berita</a>
    <a href="admin.php?page=info" class="w3-bar-item w3-button w3-padding <?php if($_GET[page] == 'info'){echo"w3-blue";}?>"><i class="fa fa-bell fa-fw"></i>  Pengumuman</a>
    <a href="admin.php?page=proker" class="w3-bar-item w3-button w3-padding <?php if($_GET[page] == 'proker'){echo"w3-blue";}?>"><i class="fa fa-briefcase fa-fw"></i>  Program Kerja</a>
    <a href="admin.php?page=km" class="w3-bar-item w3-button w3-padding <?php if($_GET[page] == 'km'){echo"w3-blue";}?>"><i class="fa fa-shield fa-fw"></i>  KM</a>
	<a href="admin.php?page=prestasi" class="w3-bar-item w3-button w3-padding <?php if($_GET[page] == 'prestasi'){echo"w3-blue";}?>"><i class="fa fa-empire fa-fw"></i>  Prestasi</a>
    <a href="admin.php?page=kontak" class="w3-bar-item w3-button w3-padding <?php if($_GET[page] == 'kontak'){echo"w3-blue";}?>"><i class="fa fa-info-circle fa-fw"></i>  Kontak</a>
    <a href="admin.php?page=pesan" class="w3-bar-item w3-button w3-padding <?php if($_GET[page] == 'pesan'){echo"w3-blue";}?>"><i class="fa fa-comment fa-fw"></i>  Pesan</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:60px;">

  <!-- ISI CONTENT -->
	<?php require $include_page;?>

  <!-- Footer -->
  <footer class="w3-container w3-card-4 w3-center w3-margin w3-blue">
    <p>BEM STMIK JAKARTA STI&K &copy; 2017 </p>
  </footer>

  <!-- End page content -->
</div>

	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/scripts.js"></script>
	<script src="../assets/js/jquery.form.js"></script>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>

</body>

<!-- Mirrored from www.w3schools.com/w3css/tryit.asp?filename=tryw3css_templates_analytics&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Dec 2017 14:07:00 GMT -->
</html>
<?php
	}
}
?>
<?php
if($_GET[action] == 'logout'){
	unset($_SESSION['admin']);
	echo "<script> window.location='index.php'</script>";
}
?>