<div class="w3-card-4 w3-white w3-margin" id="berita" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-cogs"></i> Program Kerja</b></h3>
	<hr>
  </header>
  <div class="w3-container">
    <a href="admin.php?page=c-kegiatan"class="w3-button w3-blue">Buat Kegiatan baru  <i class="fa fa-arrow-right"></i></a>
	<div class="w3-row-padding w3-section">
	  <?php
		$sql = $db->query("select * from kegiatan order by id_kegiatan DESC");
		while($r = $sql->fetch(PDO::FETCH_LAZY)){
	  ?>
		<div class="w3-col m4 w3-center w3-section">
		<div class="w3-container w3-card-4 w3-white w3-no-padding">
			
			<header class="w3-container w3-blue w3-hover-d7 w3-padding-16">
			  <span><?php echo $r['nama_kegiatan']; ?></span>
			</header>
			<div class="">
			  <img src="../assets/img/kegiatan/<?php echo $r['gambar_kegiatan']; ?>" alt="Avatar" class="w3-image" style="height:100%;">				  
			</div>
			<div class="w3-container w3-no-padding w3-border-top">
				<a href="admin.php?page=e-kegiatan&id=<?php echo $r['id_kegiatan']; ?>" style="text-decoration:none; width:50%;" class="w3-button  w3-left">Edit Kegiatan</a>
				<a href="admin.php?page=dokumentasi&id=<?php echo $r['id_kegiatan']; ?>" style="text-decoration:none; width:50%;" class="w3-button  w3-right">Dokumentasi</a>
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
	$sql2 = $db->query("delete from kegiatan where id_kegiatan='$id5'");
	if($sql2){
		echo "<script>alert('Deleted');</script>";
		echo "<script>window.location='admin.php?page=kegiatan'</script>"	;
	}else{
		echo "<script>alert('GAGAL');</script>";
		echo "<script>window.location='admin.php?page=kegiatan'</script>"	;
	}
}
?>
