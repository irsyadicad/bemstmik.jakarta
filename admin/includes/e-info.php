<?php
$id = $_GET[id];
$sql = $db->query("select * from info where id_info='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
?>
<div class="w3-card-4 w3-white w3-margin" id="info" >
  <header class="w3-container" style="padding-top:15px">
    <h3><b><i class="fa fa-bell"></i> Edit info</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=e-info&id=<?php echo $r['id_info']; ?>&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Judul info</label>
		<input class="w3-input w3-border" type="text" name="judul" value="<?php echo $r['judul_info']; ?>" required autofocus></p>
		<p>
		<label class="w3-text-blue w3-large">Gambar</label><br>
		<div class="w3-row">
			<div class="w3-col m6 w3-card-4">
				<img src="../assets/img/info/<?php echo $r['gambar_info']; ?>" class="w3-image">
			</div>
			<div class="w3-col m6 w3-padding">
				atau ganti <br>
				<input type="file" accept="image/*"  name="gambar">
			</div>
		</div>
		<p>
		<label class="w3-text-blue w3-large">Isi Deskripsi</label><br>
		<textarea name="deskripsi" class="w3-input w3-border"><?php echo $r['deskripsi_info']; ?></textarea></p>
		<p>
		<label class="w3-text-blue w3-large">Isi info</label><br>
		<textarea name="editor1" id="editor1"><?php echo $r['isi_info']; ?></textarea>
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
	$judul_info = trim(strip_tags($_POST[judul]));
	$isi_info = $_POST[editor1];
	
	$fileName1 = $_FILES['gambar']['name']; //get the file name
	$fileSize1 = $_FILES['gambar']['size']; //get the size
	$fileError1 = $_FILES['gambar']['error']; //get the error when upload
	$kode = rand(0000,9999);
	$tgl_info = date("Ymd");
	
	$fileName2 = "["."$kode"."]_["."$tgl_info"."]_info_bem-jakstik_"."$fileName1";
	if(empty($fileName1)){
			$fileName2 = $r['gambar_info'];
	}else{
		if($fileSize1 > 0 || $fileError1 == 0){ //check if the file is corrupt or error
			$move2 = move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/info/'.$fileName2); //save image to the folder
		}	
	}
	if(empty($judul_info) || empty($isi_info) || empty($isi_info)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("update info set judul_info='$judul_info', isi_info='$isi_info', gambar_info='$fileName2' where id_info='$id2'");
	if (!empty($query)) {
		echo '<script> window.location="admin.php?page=info"</script>';
		}else{
		echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
<?php
}
?>