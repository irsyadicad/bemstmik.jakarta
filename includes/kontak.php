<!-- First Parallax Image with Logo Text -->
<?php require("header.php"); ?>
<?php
$sqlk = $db->query("select * from kontak where id_kontak='1'");
while($rk = $sqlk->fetch(PDO::FETCH_LAZY)){
?>
<div class="w3-container w3-theme-d5 w3-padding-16" id="post">
	<div class="w3-row w3-center ">
		<span class="w3-h7">Kontak</span>
		<hr class="w3-hr-star">
		<i class="fa fa-star w3-star"></i>
	</div>
</div>
<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-24" id="kontak">
  <div class="w3-row w3-padding-32 w3-section">
    <div class="w3-col m6 w3-container">
		<!-- Add Google Maps -->
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.0402207872717!2d106.78999851324785!3d-6.258432395470004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f10a903f7f05%3A0x1e3c83822188e5a9!2sSTMIK+Jakarta+STI%26K!5e0!3m2!1sen!2sid!4v1485491192031" width="100%" height="420" frameborder="0" style="border:0" allowfullscreen></iframe>
		<!-- Add Google Maps
		<div id="googleMap" style="height:400px;width:100%;"></div>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		-->
    </div>
    <div class="w3-col m6 w3-panel">
      <table class="w3-table">
		<tr>
			<td><i class="fa fa-map-marker"></i></td>
			<td><?php echo $rk['alamat']; ?></td>
		</tr>
		<tr>
			<td><i class="fa fa-phone "></i></td>
			<td>Phone: <?php echo $rk['telp']; ?></td>
        </tr>
		<tr>
			<td><i class="fa fa-envelope"></i></td>
			<td>Email: <?php echo $rk['email']; ?></td>
		</tr>
      </table>
      <p>Swing by for a cup of <i class="fa fa-coffee"></i>, or leave me a note:</p>
      <form action="index.php?page=kontak&action=go" method="post">
        <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
          <div class="w3-half">
            <input class="w3-input w3-border" type="text" placeholder="Name" required name="nama">
          </div>
          <div class="w3-half">
            <input class="w3-input w3-border" type="email" placeholder="Email" required name="email">
          </div>
        </div>
        <input class="w3-input w3-border" type="text" placeholder="Message" required name="isi">
        <button class="w3-button w3-block w3-theme-d3-link w3-right w3-section" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </form>
    </div>
  </div>
</div>
<?php
}
?>


<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container w3-opacity-min">
  <div class="w3-display-middle w3-center" style="width:100%;">
    <span class="w3-xxlarge w3-text-white w3-wide">BEM STMIK JAKARTA STI&K </span>
  </div>
</div>

<?php
if($_GET[action] == 'go'){
	$nama_pesan = trim(strip_tags($_POST[nama]));
	$email_pesan = trim(strip_tags($_POST[email]));
	$isi_pesan = trim(strip_tags($_POST[isi]));
	date_default_timezone_set("Asia/Jakarta");
	$tgl_pesan = date("Y-m-d H:i:s");

	if(empty($nama_pesan) || empty($email_pesan) || empty($isi_pesan)){
		echo '<script>alert ("harap isi semua");</script>';
	}else{
	$query = $db->query("insert into pesan values('','$nama_pesan','$email_pesan','$isi_pesan','$tgl_pesan')");
	
		if(!empty($query)) {
		echo '<script>alert ("Terima kasih atas kirtik dan saran");</script>';
		echo '<script> window.location="kontak"</script>';
		}else{
		echo '<script>alert ("gagal membuat kritik");</script>';
		}
	}/*tutup if empty */
}
?>