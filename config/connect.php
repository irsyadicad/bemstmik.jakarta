<?php
try{
$db = new PDO('mysql:host=localhost;dbname=stikjakar_bem', "root", "");
$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch (PDOException $e) {
	print "Koneksi atau query bermasalah: " . $e->getMessage();
	die();
}
?>