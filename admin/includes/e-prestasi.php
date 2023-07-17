<?php
$id = $_GET[id];
$sql = $db->query("select * from prestasi, km where prestasi.id_km = km.id_km and prestasi.id_prestasi='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
?>
<div class="w3-card-4 w3-white w3-margin" id="prestasi" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Edit Prestasi</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=e-prestasi&id=<?php echo $r['id_prestasi']; ?>&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Nama Prestasi</label>
		<input class="w3-input w3-border" type="text" name="nama" value="<?php echo $r['nama_prestasi']; ?>"></p>
		<p>
		<label class="w3-text-blue w3-large">KM</label>
		<select class="w3-select w3-border" name="km">
		<?php
			$sqlk = $db->query("select * from km order by id_km");
			while($rk = $sqlk->fetch(PDO::FETCH_LAZY)){
		 ?>
			  <option value="<?php echo $rk['id_km'];?>"
			  <?php
				if($rk['id_km'] == $r['id_km']){
					echo "selected";
				}
			  ?>
			  ><?php echo $rk['nama_km']; ?></option>
		<?php
			}
		?>
		</select>
		</p>
		<p>
		<label class="w3-text-blue w3-large">Tingkat Prestasi</label>
		<input class="w3-input w3-border" type="text" name="tingkat" value="<?php echo $r['tingkat_prestasi']; ?>"></p>
		<p>
		<p>
		<label class="w3-text-blue w3-large">Tahun Prestasi</label>
		<input class="w3-input w3-border" type="text" name="tahun" value="<?php echo $r['tahun_prestasi']; ?>"></p>
		<p>
		<label class="w3-text-blue w3-large">Keterangan Prestasi</label>
		<input class="w3-input w3-border" type="text" name="ket" value="<?php echo $r['ket_prestasi']; ?>"></p>
		
		<button class="w3-btn w3-blue w3-margin-bottom" type="submit">Submit</button>
	</form>
  </div>
</div>
<?php
}
?>
<?php
if($_GET[action] == 'go'){
	$id2 = $_GET[id];
	$id_km = trim(strip_tags($_POST[km]));
	$nama_prestasi = trim(strip_tags($_POST[nama]));
	$tingkat_prestasi = trim(strip_tags($_POST[tingkat]));
	$tahun_prestasi = trim(strip_tags($_POST[tahun]));
	$ket_prestasi = trim(strip_tags($_POST[ket]));
	
	if(empty($nama_prestasi) || empty($tingkat_prestasi) || empty($tahun_prestasi) || empty($ket_prestasi)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("update prestasi set id_km='$id_km', nama_prestasi='$nama_prestasi', tingkat_prestasi='$tingkat_prestasi', tahun_prestasi='$tahun_prestasi', ket_prestasi='$ket_prestasi' where id_prestasi='$id2'");
		if (!empty($query)) {
			echo '<script> window.location="admin.php?page=prestasi"</script>';
		}else{
			echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
