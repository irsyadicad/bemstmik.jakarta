<div class="w3-card-4 w3-white w3-margin" id="info" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Buat Pengunguman</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=c-info&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Judul info</label>
		<input class="w3-input w3-border" type="text" name="judul">
		<input class="w3-input w3-border" type="hidden" name="penulis" value="<?php echo $nickname; ?>"></p>
		<p>
		<label class="w3-text-blue w3-large">Gambar</label><br>
		<input class="" type="file" accept="image/*" name="gambar"></p>
		<p>
		<label class="w3-text-blue w3-large">Isi Deskripsi</label><br>
		<textarea name="deskripsi" class="w3-input w3-border"></textarea></p>
		<p>
		<label class="w3-text-blue w3-large">Isi info</label><br>
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
	$judul_info = trim(strip_tags($_POST[judul]));
	$penulis = trim(strip_tags($_POST[penulis]));
	$deskripsi_info = trim(strip_tags($_POST[deskripsi]));
	$isi_info = $_POST[editor1];	
	date_default_timezone_set("Asia/Jakarta");
	$tgl_info = date("Ymd");
	
	$fileName1 = $_FILES['gambar']['name']; //get the file name
	$fileSize1 = $_FILES['gambar']['size']; //get the size
	$fileError1 = $_FILES['gambar']['error']; //get the error when upload
	$kode = rand(0000,9999);
	
	$fileName2 = "["."$kode"."]_["."$tgl_info"."]_info_bem-jakstik_"."$fileName1";
	
	if($fileSize1 > 0 || $fileError1 == 0){ //check if the file is corrupt or error
		$move2 = move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/info/'.$fileName2); //save image to the folder
	}
	
	if(empty($judul_info) || empty($isi_info) || empty($fileName1)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("insert into info values('','$judul_info','$fileName2','$deskripsi_info','$isi_info','$tgl_info','$penulis')");
		if (!empty($query)) {
			echo '<script> window.location="admin.php?page=info"</script>';
		}else{
			echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
