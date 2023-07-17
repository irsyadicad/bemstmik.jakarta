<?php
//header('Location: maintenance.php');
ob_start();
session_start();
require_once("config/control_index.php");
require_once("config/connect.php");
require_once("config/myscript.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
<base href="http://localhost/bem-old/" />
<?php include("config/meta.php"); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/snorkel-blue.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-theme-d3";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-theme-d3", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

</script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.0&appId=494683717595200&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars w3-bg-dark"></i>
    </a>
    <a href="kontak" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-trans" <?php if($_GET[page] == 'kontak'){echo"w3-disabled";}?>" > Kontak</a>
    <a href="kema" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-trans" <?php if($_GET[page] == 'kema'){echo"w3-disabled";}?>"> Kegiatan Mahasiswa</a>
    <a href="proker" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-trans" <?php if($_GET[page] == 'proker'){echo"w3-disabled";}?>"> Program Kerja</a>
    <a href="pengumuman" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-trans" <?php if($_GET[page] == 'pengumuman'){echo"w3-disabled";}?>"> Pengumuman</a>
    <a href="berita" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-trans" <?php if($_GET[page] == 'berita'){echo"w3-disabled";}?>"> Berita</a>
    <a href="profil" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-trans" <?php if($_GET[page] == 'profil'){echo"w3-disabled";}?>"> Profil</a>
    <a href="index.html" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-trans" <?php if (!($_GET[page])){echo"w3-disabled";}?>"> Beranda</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d5 w3-hide w3-hide-large w3-hide-medium">
	<span class="w3-bar-item w3-theme-l1 w3-center w3-xlarge">BEM - JAKSTIK</span>
    <a href="index.html" class="w3-bar-item w3-button" onclick="toggleFunction()">Beranda</a>
    <a href="profil" class="w3-bar-item w3-button" onclick="toggleFunction()">Profil</a>
    <a href="berita" class="w3-bar-item w3-button" onclick="toggleFunction()">Berita</a>
    <a href="pengumuman" class="w3-bar-item w3-button" onclick="toggleFunction()">Pengumuman</a>
    <a href="proker" class="w3-bar-item w3-button" onclick="toggleFunction()">Program Kerja</a>
    <a href="kema" class="w3-bar-item w3-button" onclick="toggleFunction()">Kegiatan Mahasiswa</a>
    <a href="kontak" class="w3-bar-item w3-button" onclick="toggleFunction()">Kontak</a>
  </div>
</div>

<!-- ISI WEBSITE -->
<?php require $include_page;?>

<!-- Footer -->
<?php require("includes/footer.php"); ?>


<!-- Add Google Maps -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
