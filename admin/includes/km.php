<div class="w3-card-4 w3-white w3-margin" id="berita" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Kegiatan Mahasiswa</b></h3>
	<hr>
  </header>
  <div class="w3-container">
    <a href="admin.php?page=c-km"class="w3-button w3-blue">Buat KM baru  <i class="fa fa-arrow-right"></i></a>
	<div class="w3-row-padding w3-section">
	  <?php
		$sql = $db->query("select * from km");
		while($r = $sql->fetch(PDO::FETCH_LAZY)){
	  ?>
		<div class="w3-col m3 w3-center w3-section">
		<div class="w3-container w3-card-4 w3-white w3-no-padding">
			
			<header class="w3-container w3-blue w3-hover-d7">
			  <h3><?php echo $r['nama_km']; ?></h3>
			</header>
			<div class="w3-container w3-padding-16">
			  <img src="../assets/img/logo/<?php echo $r['logo_km']; ?>" alt="Avatar" class="w3-image" style="width:100%;">				  
			</div>
			<div class="w3-container w3-no-padding w3-border-top">
				<a href="admin.php?page=e-km&id=<?php echo $r['nama_km']; ?>" style="text-decoration:none; width:50%;" class="w3-button  w3-left">Edit Profil</a>
				<a href="admin.php?page=foto-km&id=<?php echo $r['nama_km']; ?>" style="text-decoration:none; width:50%;" class="w3-button  w3-right">Foto KM</a>
			</div>
		</div>
		</div>
	  <?php
		}
	  ?>
	</div>

  </div>
</div>
<?php
if($_GET[action] == 'delete'){
	$id5 = $_GET[id];
	$sql2 = $db->query("delete from berita where id_berita='$id5'");
	if($sql2){
		echo "<script>alert('Deleted');</script>";
		echo "<script>window.location='admin.php?page=berita'</script>"	;
	}else{
		echo "<script>alert('GAGAL');</script>";
		echo "<script>window.location='admin.php?page=berita'</script>"	;
	}
}
?>
