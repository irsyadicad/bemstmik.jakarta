<?php require("header.php"); ?>

<div class="w3-container w3-theme-d5 w3-padding-16" id="post">
	<div class="w3-row w3-center ">
		<span class="w3-h7">Program Kerja</span>
		<hr class="w3-hr-star">
		<i class="fa fa-star w3-star"></i>
	</div>
</div>
<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-24" style="max-width:auto;" id="intro-km">
  <p class="w3-center w3-xlarge w3-text-d3">Program Kerja BEM STMIK Jakarta STI&K </p>
  <p class="w3-center w3-large w3-padding-large">Kegiatan yang diselenggarakan oleh Badan Eksekutif Mahasiswa selaku Lembaga Eksekutif Kemahasiswaan. terdapat 3 jenis kegiatan yaitu Pendidikan, Olahraga, dan Kerohanian yang masuk dalam program kerja BEM</p>

	<div class="w3-content w3-container w3-padding-24"  id="km">
		<hr class="w3-hr-star">
		<h2 class="w3-center w3-text-l1">Program Kerja</h2>
		<hr class="w3-hr-star">
		
		<div class="w3-row-padding w3-section">
		<?php
		$sql = $db->query("SELECT * from kegiatan order by id_kegiatan DESC");
		while($r = $sql->fetch(PDO::FETCH_LAZY)){
			$judul_seo= seo_title($r['nama_kegiatan']);
		?>	
			<div class="w3-col l4 m6 w3-center w3-section proker-card">
			<div class="w3-container w3-card-4 w3-white w3-no-padding">
				<a href="kegiatan/<?php echo $r['id_kegiatan']; ?>/<?php echo $judul_seo;?>" style="text-decoration:none;">
				<header class="w3-container w3-blue w3-hover-d7 w3-padding-16">
				  <span><?php echo $r['nama_kegiatan']; ?></span>
				</header>
				<div class="">
				  <img src="assets/img/kegiatan/<?php echo $r['gambar_kegiatan']; ?>" alt="Avatar" class="w3-image" style="width:100%;">				  
				</div>
				</a>
			</div>
			</div>
		<?php
		}
		?>
			
		</div>	
	</div>
</div>

