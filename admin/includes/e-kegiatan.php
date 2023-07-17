<?php
$id = $_GET[id];
$sql = $db->query("select * from kegiatan where id_kegiatan='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
?>
<div class="w3-card-4 w3-white w3-margin" id="kegiatan" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-cogs"></i> Edit kegiatan</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=e-kegiatan&id=<?php echo $r['id_kegiatan']; ?>&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Nama kegiatan</label>
		<input class="w3-input w3-border" type="text" name="nama" value="<?php echo $r['nama_kegiatan']; ?>" required autofocus></p>
		<p>
		<label class="w3-text-blue w3-large">Gambar</label><br>
		<div class="w3-row">
			<div class="w3-col m6 w3-card-4">
				<img src="../assets/img/kegiatan/<?php echo $r['gambar_kegiatan']; ?>" class="w3-image">
			</div>
			<div class="w3-col m6 w3-padding">
				atau ganti <br>
				<input type="file" accept="image/*"  name="gambar">
			</div>
		</div>
		<p>
		<label class="w3-text-blue w3-large">Deskripsi kegiatan</label><br>
		<textarea name="editor1" id="editor1"><?php echo $r['isi_kegiatan']; ?></textarea>
		<Script>
			CKEDITOR.replace('editor1',{customConfig:'../ckeditor/constum.js'});
		</script></p>
		<button class="w3-btn w3-blue w3-margin-bottom" type="submit">Submit</button>
	</form>
  </div>
</div>
<?php
if($_GET[action] == 'go'){
	$id2 = $_GET[id];
	$nama_kegiatan = trim(strip_tags($_POST[nama]));
	$isi_kegiatan = $_POST[editor1];	
	
	$fileName1 = $_FILES['gambar']['name']; //get the file name
	$fileSize1 = $_FILES['gambar']['size']; //get the size
	$fileError1 = $_FILES['gambar']['error']; //get the error when upload
	$kode = rand(0000,9999);
	
	$fileName2 = "["."$kode"."]_kegiatan-bem-jakstik_"."$fileName1";
	if(empty($fileName1)){
			$fileName2 = $r['gambar_kegiatan'];
	}else{
		if($fileSize1 > 0 || $fileError1 == 0){ //check if the file is corrupt or error
			$move2 = move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/kegiatan/'.$fileName2); //save image to the folder
		}
	}

	if(empty($nama_kegiatan) || empty($isi_kegiatan) || empty($isi_kegiatan)){
		echo '<script>alert ("harap isi semua");</script>';
	}else{
	$query = $db->query("update kegiatan set nama_kegiatan='$nama_kegiatan', isi_kegiatan='$isi_kegiatan', gambar_kegiatan='$fileName2' where id_kegiatan='$id2'");
	if (!empty($query)) {
		echo '<script> window.location="admin.php?page=proker"</script>';
		}else{
		echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
<?php
}
?>