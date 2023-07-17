<?php
$id = $_GET[id];
$sql = $db->query("select * from berita, kategori where berita.id_kategori = kategori.id_kategori and berita.id_berita='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
?>
<div class="w3-card-4 w3-white w3-margin" id="berita" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Edit Berita</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=e-berita&id=<?php echo $r['id_berita']; ?>&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Judul Berita</label>
		<input class="w3-input w3-border" type="text" name="judul" value="<?php echo $r['judul_berita']; ?>" required autofocus></p>
		<p>
		<label class="w3-text-blue w3-large">Kategori</label>
		<select class="w3-select w3-border" name="kategori" required>
		<?php
			$sqlk = $db->query("select * from kategori order by id_kategori");
			while($rk = $sqlk->fetch(PDO::FETCH_LAZY)){
		 ?>
			  <option value="<?php echo $rk['id_kategori'];?>"
			  <?php
				if($rk['id_kategori'] == $r['id_kategori']){
					echo "selected";
				}
			  ?>
			  ><?php echo $rk['nama_kategori']; ?></option>
		<?php
			}
		?>
		</select>
		</p>
		<p>
		<label class="w3-text-blue w3-large">Gambar</label><br>
		<div class="w3-row">
			<div class="w3-col m6 w3-card-4">
				<img src="../assets/img/berita/<?php echo $r['gambar_berita']; ?>" class="w3-image">
			</div>
			<div class="w3-col m6 w3-padding">
				atau ganti <br>
				<input type="file" accept="image/*"  name="gambar">
			</div>
		</div>
		<p>
		<label class="w3-text-blue w3-large">Isi Deskripsi</label><br>
		<textarea name="deskripsi" class="w3-input w3-border"><?php echo $r['deskripsi_berita']; ?></textarea></p>
		<p>
		<label class="w3-text-blue w3-large">Isi Berita</label><br>
		<textarea name="editor1" id="editor1"><?php echo $r['isi_berita']; ?></textarea>
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
	$judul_berita = trim(strip_tags($_POST[judul]));
	$id_kategori = trim(strip_tags($_POST[kategori]));
	$isi_berita = $_POST[editor1];
	
	
	$fileName1 = $_FILES['gambar']['name']; //get the file name
	$fileSize1 = $_FILES['gambar']['size']; //get the size
	$fileError1 = $_FILES['gambar']['error']; //get the error when upload
	$kode = rand(0000,9999);
	$tgl_berita = date("Ymd");
	
	$fileName2 = "["."$kode"."]_["."$tgl_berita"."]_bem-jakstik_"."$fileName1";
	if(empty($fileName1)){
			$fileName2 = $r['gambar_berita'];
	}else{
		if($fileSize1 > 0 || $fileError1 == 0){ //check if the file is corrupt or error
			$move2 = move_uploaded_file($_FILES['gambar']['tmp_name'], '../assets/img/berita/'.$fileName2); //save image to the folder
		}	
	}
	if(empty($judul_berita) || empty($isi_berita) || empty($isi_berita)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("update berita set judul_berita='$judul_berita', isi_berita='$isi_berita', gambar_berita='$fileName2', id_kategori='$id_kategori' where id_berita='$id2'");
	if (!empty($query)) {
		echo '<script> window.location="admin.php?page=berita"</script>';
		}else{
		echo '<script>alert ("gagal membuat postingan");</script>';
		}
	}
}
?>
<?php
}
?>