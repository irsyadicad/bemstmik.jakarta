<?php require("header.php"); ?>

<div class="w3-container w3-theme-d5 w3-padding-16" id="post">
	<div class="w3-row w3-center ">
		<span class="w3-h7">Kegiatan Mahasiswa</span>
		<hr class="w3-hr-star">
		<i class="fa fa-star w3-star"></i>
	</div>
</div>
<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-24" style="max-width:720px;" id="intro-km">
  <p class="w3-center w3-xlarge w3-text-d3">Kegiatan Mahasiswa STMIK Jakarta STI&K </p>
  <p class="w3-center w3-large w3-padding-large">Terdapat kegiatan mahasiswa dibawah nauangan BEM sesuai dengan minat dan bakatnya, yang terbagi menjadi tiga yaitu Olahraga, Pendidikan, dan Kerohanian.<br> dimana Kegiatan Mahasiswa dapat menyalurkan minat dan bakat mahasiswa STMIK Jakarta STI&K dan mendapatkan prestasi sesuai bidangnya.</p>

	<div class="w3-content w3-container w3-padding-24"  id="km">
		<hr class="w3-hr-head">
		<h2 class="w3-center w3-text-l1">Kegiatan Mahasiswa</h2>
		<hr class="w3-hr-head">
		
		<div class="w3-row-padding w3-section">
		<?php
		$sql = $db->query("select * from km");
		while($r = $sql->fetch(PDO::FETCH_LAZY)){
		?>	
			<div class="w3-col l4 m6 w3-center w3-section">
			<div class="w3-container w3-card-4 w3-white w3-no-padding">
				<a href="km/<?php echo $r['nama_km']; ?>" style="text-decoration:none;">
				<header class="w3-container w3-blue w3-hover-d7">
				  <h3><?php echo $r['nama_km']; ?></h3>
				</header>
				<div class="w3-container w3-padding-16">
				  <img src="assets/img/logo/<?php echo $r['logo_km']; ?>" alt="Avatar" class="w3-image" style="width:100%;">				  
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

