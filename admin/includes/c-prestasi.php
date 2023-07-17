<div class="w3-card-4 w3-white w3-margin" id="prestasi" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Buat Prestasi</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=c-prestasi&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Nama Prestasi</label>
		<input class="w3-input w3-border" type="text" name="nama"></p>
		<p>
		<label class="w3-text-blue w3-large">KM</label>
		<select class="w3-select w3-border" name="km">
		<?php
			$sqlk = $db->query("select * from km order by id_km");
			while($rk = $sqlk->fetch(PDO::FETCH_LAZY)){
		 ?>
			  <option value="<?php echo $rk['id_km']; ?>"><?php echo $rk['nama_km']; ?></option>
		<?php
			}
		?>
		</select>
		</p>
		<p>
		<label class="w3-text-blue w3-large">Tingkat Prestasi</label>
		<input class="w3-input w3-border" type="text" name="tingkat"></p>
		<p>
		<p>
		<label class="w3-text-blue w3-large">Tahun Prestasi</label>
		<select class="w3-select w3-border" name="tahun">
		<?php
			for($th=2010;$th<=2025;$th++){
		 ?>
			  <option value="<?php echo $th; ?>"><?php echo $th; ?></option>
		<?php
			}
		?>
		</select>
		<p>
		<label class="w3-text-blue w3-large">Keterangan Prestasi</label>
		<input class="w3-input w3-border" type="text" name="ket"></p>
		
		<button class="w3-btn w3-blue w3-margin-bottom" type="submit">Submit</button>
	</form>
  </div>
</div>
<?php
if($_GET[action] == 'go'){
	$id_km = trim(strip_tags($_POST[km]));
	$nama_prestasi = trim(strip_tags($_POST[nama]));
	$tingkat_prestasi = trim(strip_tags($_POST[tingkat]));
	$tahun_prestasi = trim(strip_tags($_POST[tahun]));
	$ket_prestasi = trim(strip_tags($_POST[ket]));
	
	if(empty($nama_prestasi) || empty($tingkat_prestasi) || empty($tahun_prestasi) || empty($ket_prestasi)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("insert into prestasi values('','$id_km','$nama_prestasi','$tingkat_prestasi','$tahun_prestasi','$ket_prestasi')");
		if (!empty($query)) {
			echo '<script> window.location="admin.php?page=prestasi"</script>';
		}else{
			echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
