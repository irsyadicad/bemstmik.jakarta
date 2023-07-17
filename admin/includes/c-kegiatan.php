<div class="w3-card-4 w3-white w3-margin" id="kegiatan" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Buat Kegiatan</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=c-kegiatan&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Nama Kegiatan</label>
		<input class="w3-input w3-border" type="text" name="nama"></p>
		<p>
		<label class="w3-text-blue w3-large">Gambar kegiatan</label><br>
		<input class="" type="file" accept="image/*" name="gambar">
		<p>
		<label class="w3-text-blue w3-large">Desikripsi kegiatan</label><br>
		<textarea name="editor1" id="editor1"></textarea>
		<Script>
			CKEDITOR.replace('editor1',{customConfig:'../ckeditor/constum.js'});
		</script></p>
		<button class="w3-btn w3-blue w3-margin-bottom" type="submit">Submit</button>
	</form>
  </div>
</div>
<?php
if($_GET[action] == 'go'){
	$nama_kegiatan = trim(strip_tags($_POST[nama]));
	$isi_kegiatan = $_POST[editor1];	
	
	$fileName1 = $_FILES['gambar']['name']; //get the file name
	$fileSize1 = $_FILES['gambar']['size']; //get the size
	$fileError1 = $_FILES['gambar']['error']; //get the error when upload
	$kode = rand(0000,9999);
	
	$fileName2 = "["."$kode"."]_kegiatan-bem-jakstik_"."$fileName1";
	
	if($fileSize1 > 0 || $fileError1 == 0){ //check if the file is corrupt or error
		$move2 = move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/kegiatan/'.$fileName2); //save image to the folder
	}

	if(empty($nama_kegiatan) || empty($isi_kegiatan) || empty($fileName1)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="admin.php?page=k-create"</script>';
	}else{
	$query = $db->query("insert into kegiatan values('','$nama_kegiatan','$isi_kegiatan','$fileName2')");
	if (!empty($query)) {
		echo '<script> window.location="admin.php?page=proker"</script>';
		}else{
		echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
