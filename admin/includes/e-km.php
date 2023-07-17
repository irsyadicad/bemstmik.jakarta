<?php
$id = $_GET[id];
$sql = $db->query("select * from km where nama_km='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
?>
<div class="w3-card-4 w3-white w3-margin" id="berita" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Edit KM <?php echo $r['nama_km']; ?></b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=e-km&id=<?php echo $r['nama_km']; ?>&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Nama KM</label>
		<input class="w3-input w3-border" type="text" name="nama" value="<?php echo $r['nama_km']; ?>" required autofocus></p>
		<p>
		<label class="w3-text-blue w3-large">Gambar</label><br>
		<div class="w3-row">
			<div class="w3-col m6 w3-card-4">
				<img src="../assets/img/logo/<?php echo $r['logo_km']; ?>" class="w3-image">
			</div>
			<div class="w3-col m6 w3-padding">
				atau ganti <br>
				<input type="file" accept="image/*"  name="gambar">
			</div>
		</div>
		<p>
		<p>
		<label class="w3-text-blue w3-large">Divisi KM</label>
		<select class="w3-select w3-border" name="divisi" required>
			  <option value="Olahraga"
			  <?php
				if($r['divisi_km'] == 'Olahraga'){
					echo "selected";
				}
			  ?>
			  >Olahraga</option>
			  <option value="Pendidikan"
			  <?php
				if($r['divisi_km'] == 'Pendidikan'){
					echo "selected";
				}
			  ?>
			  >Pendidikan</option>
			  <option value="Kerohanian"
			  <?php
				if($r['divisi_km'] == 'Kerohanian'){
					echo "selected";
				}
			  ?>
			  >Kerohanian</option>
		</select>
		</p>
		<p>
		<label class="w3-text-blue w3-large">Ketua KM</label>
		<input class="w3-input w3-border" type="text" name="ketua" value="<?php echo $r['ketua_km']; ?>" required></p>
		<p>
		<label class="w3-text-blue w3-large">kontak KM</label>
		<input class="w3-input w3-border" type="text" name="kontak" value="<?php echo $r['kontak_km']; ?>" required></p>
		<p>
		<label class="w3-text-blue w3-large">Profil KM</label><br>
		<textarea name="editor1" id="editor1"><?php echo $r['profil_km']; ?></textarea>
		<Script>
			CKEDITOR.replace('editor1',{customConfig:'../ckeditor/constum.js'});
		</script></p>
		<button class="w3-btn w3-blue w3-margin-bottom" type="submit">Submit</button>
	</form>
  </div>
</div>
<?php
if($_GET[action] == 'go'){
	$id2 = $r['id_km'];
	$nama_km= trim(strip_tags($_POST[nama]));
	$divisi_km = trim(strip_tags($_POST[divisi]));
	$ketua_km = trim(strip_tags($_POST[ketua]));
	$kontak_km = trim(strip_tags($_POST[kontak]));
	$profil_km = $_POST[editor1];
	
	
	$fileName1 = $_FILES['gambar']['name']; //get the file name
	$fileSize1 = $_FILES['gambar']['size']; //get the size
	$fileError1 = $_FILES['gambar']['error']; //get the error when upload
	$kode = rand(0000,9999);
	
	$fileName2 = $fileName1;
	if(empty($fileName1)){
			$fileName2 = $r['logo_km'];
	}else{
		if($fileSize1 > 0 || $fileError1 == 0){ //check if the file is corrupt or error
			$move2 = move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/logo/'.$fileName2); //save image to the folder
		}	
	}
	if(empty($nama_km) || empty($divisi_km) || empty($fileName2) || empty($ketua_km)  || empty($kontak_km) || empty($profil_km)){
		echo '<script>alert ("'.$nama_km.'");</script>';
		echo '<script>alert ("'.$divisi_km.'");</script>';
		echo '<script>alert ("'.$fileName1.'");</script>';
		echo '<script>alert ("'.$ketua_km.'");</script>';
		echo '<script>alert ("'.$kontak_km.'");</script>';
		echo '<script>alert ("'.$profil_km.'");</script>';
		
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("update km set nama_km='$nama_km', divisi_km='$divisi_km', logo_km='$fileName2', ketua_km='$ketua_km', kontak_km='$kontak_km', profil_km='$profil_km' where id_km='$id2'");
	if (!empty($query)) {
		echo '<script> window.location="admin.php?page=km"</script>';
		}else{
		echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
<?php
}
?>