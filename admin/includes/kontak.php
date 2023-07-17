<?php
$sql = $db->query("select * from kontak where id_kontak='1'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
?>
<div class="w3-card-4 w3-white w3-margin" id="info" >
  <header class="w3-container" style="padding-top:15px">
    <h3><b><i class="fa fa-info-circle"></i> Edit Kontak</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=kontak&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Telp</label>
		<input class="w3-input w3-border" type="text" name="telp" value="<?php echo $r['telp']; ?>" required autofocus></p>
		<p>
		<label class="w3-text-blue w3-large">Email</label>
		<input class="w3-input w3-border" type="email" name="email" value="<?php echo $r['email']; ?>" required></p>
		<p>
		<label class="w3-text-blue w3-large">Facebook</label>
		<input class="w3-input w3-border" type="text" name="facebook" value="<?php echo $r['facebook']; ?>" required></p>
		<p>
		<label class="w3-text-blue w3-large">Instagram</label>
		<input class="w3-input w3-border" type="text" name="instagram" value="<?php echo $r['instagram']; ?>" required></p>
		<p>
		<label class="w3-text-blue w3-large">Twitter</label>
		<input class="w3-input w3-border" type="text" name="twitter" value="<?php echo $r['twitter']; ?>" required></p>
		<p>
		<label class="w3-text-blue w3-large">Alamat</label><br>
		<textarea name="alamat" class="w3-input w3-border" rows=4><?php echo $r['alamat']; ?></textarea></p>
		<button class="w3-btn w3-blue w3-margin-bottom" type="submit">Submit</button>
	</form>
  </div>
</div>
<?php
if($_GET[action] == 'go'){
	$id2 = $_GET[id];
	$telp = trim(strip_tags($_POST[telp]));
	$email = trim(strip_tags($_POST[email]));
	$facebook = trim(strip_tags($_POST[facebook]));
	$instagram = trim(strip_tags($_POST[instagram]));
	$twitter = trim(strip_tags($_POST[twitter]));
	$alamat = trim(strip_tags($_POST[alamat]));
	

	if(empty($telp) || empty($email) || empty($facebook) || empty($instagram) || empty($twitter) || empty($alamat)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("update kontak set telp='$telp', email='$email', facebook='$facebook', instagram='$instagram', twitter='$twitter', alamat='$alamat' where id_kontak='1'");
	if (!empty($query)) {
		echo '<script> window.location="admin.php?page=kontak"</script>';
		}else{
		echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
<?php
}
?>