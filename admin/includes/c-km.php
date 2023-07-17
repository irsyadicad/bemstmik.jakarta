<div class="w3-card-4 w3-white w3-margin" id="berita" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Buat Kegiatan Mahasiswa</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=c-km&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Nama KM</label>
		<input class="w3-input w3-border" type="text" name="nama"></p>
		<p>
		<label class="w3-text-blue w3-large">Logo KM</label><br>
		<input class="" type="file" accept="image/*" name="gambar">
		<p>
		<label class="w3-text-blue w3-large">Divisi KM</label>
		<select class="w3-select w3-border" name="divisi">
			  <option value="Olahraga">Olahraga</option>
			  <option value="Pendidikan">Pendidikan</option>
			  <option value="Kerohanian">Kerohanian</option>
		</select>
		</p>
		<p>
		<label class="w3-text-blue w3-large">Ketua KM</label>
		<input class="w3-input w3-border" type="text" name="ketua"></p>
		<p>
		<label class="w3-text-blue w3-large">kontak KM</label>
		<input class="w3-input w3-border" type="text" name="kontak"></p>
		<p>
		<label class="w3-text-blue w3-large">Profil KM</label><br>
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
	
	if($fileSize1 > 0 || $fileError1 == 0){ //check if the file is corrupt or error
		$move2 = move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/logo/'.$fileName2); //save image to the folder
	}
	
	if(empty($nama_km) || empty($divisi_km) || empty($fileName1) || empty($ketua_km)  || empty($kontak_km) || empty($profil_km)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("insert into km values('','$nama_km','$fileName2','$divisi_km','$ketua_km','$profil_km','$kontak_km')");
		if (!empty($query)) {
			echo '<script> window.location="admin.php?page=km"</script>';
		}else{
			echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
