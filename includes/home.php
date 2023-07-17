<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container" id="home">
  <div class="w3-display-middle w3-banner">
		<div class="w3-container w3-center">
			<img src="assets/img/logo-3a.png" class="w3-image" style="width:100%;max-width:420px" alt="logo bem">
	    </div>
		<h3 class="w3-center w3-padding-large  w3-large w3-text-white">Sinergis - Positif - Aktif</h3>
	    <div class="w3-container w3-center">
	      	<button class="w3-button w3-round-large w3-trans w3-margin w3-hover-yellow"><b>Profil BEM</b></button>
	      	<button class="w3-button w3-round-large w3-trans w3-margin w3-hover-yellow"><b>Situs Jak-stik</b></button>
      	</div>
  </div>
</div>

<div class="w3-container w3-theme-d5 w3-padding-24" id="post">
	<div class="w3-row w3-center ">
		<span class="w3-h7">POST</span><br>
		<span>kegiatan yang berlangsung</span>
		<hr class="w3-hr-star">
		<i class="fa fa-star w3-star"></i>
	</div>
	<div class="w3-row-padding w3-center ">
<?php
$sql = $db->query("select * from info order by id_info desc limit 4");
while($r = $sql->fetch(PDO::FETCH_ASSOC)) {
	$judul_seo= seo_title($r['judul_info']); 
?>	
		<div class="w3-col m3 w3-section">
	      	<div class="w3-display-container" style="transition:0.5s;width:100%">
			    <img src="assets/img/info/<?php echo $r['gambar_info']; ?>" alt="Pants" style="width:100%">
			    <div class="w3-hide-small" id="gopost">
					<div class="w3-display-topmiddle w3-display-hover w3-animate-opacity">
					</div>
					<div class="w3-display-middle w3-display-hover w3-large w3-text-white">
					 <a href="info/<?php echo $r['id_info']; ?>/<?php echo $judul_seo;?>" style="text-decoration:none;"><div class="w3-animate-opacity"><?php echo $r['judul_info']; ?> </div>
					 <i class="fa fa-search w3-rounded w3-animate-opacity"></i></a>
					</div>
				</div>
				<div class="w3-hide-large w3-hide-medium" id="gopost">
					<div class="w3-display-topmiddle">
					</div>
					<div class="w3-display-middle w3-display w3-large w3-text-white">
					 <a href="info/<?php echo $r['id_info']; ?>/<?php echo $judul_seo;?>" style="text-decoration:none;"><div class=""><?php echo $r['judul_info']; ?> </div>
					 <i class="fa fa-search w3-rounded"></i></a>
					</div>
				</div>
			</div>
	    </div>
<?php
}
?>		

		
		
		
	</div>
</div>
<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-24" id="about">
  <h2 class="w3-center w3-text-l1">BEM STMIK JAKARTA STI&K </h2>
  <p class="w3-center w3-xlarge w3-text-d3"><em>" We Are a Melody Campus "</em></p>
  <p class="w3-center w3-large w3-padding-large">BEM STMIK Jakarta STI&K adalah lembaga eksekutif di kelembagaan kemahasiswaan STMIK Jakarta STI&K. Lembaga yang menjadi wadah suara dan penyalur aspirasi dari mahasiswa untuk kampus,demi mencapainya kemajuan STMIK jakarta STI&K. dengan visi dan misi yang menjadi lentera bagi mahasiswa dalam mencapai prestasi disetiap bidangnya, mengedepankan jiwa kepemimpinan serta rasa kekeluargaan guna tercapainya ketersinambungan antar anggota lembaga.</p>
  <div class="w3-row">
	<div class="w3-col m12 w3-center w3-padding-large">
      <img src="assets/img/logo-3-b.png" class="w3-round w3-image" alt="Photo of Me" style="width:100%; max-width:160px;">
    </div>
  </div>
  <p class="w3-center w3-large w3-padding-large">Bersinergi dengan civitas kampus dalam menjalakan aspirasi mahasiswa untuk tercapainya tujuan bersama.</p>
	
</div>



<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container w3-opacity-min">
  <div class="w3-display-middle w3-center" style="width:100%;">
    <span class="w3-xxlarge w3-text-white w3-wide ">BEM STMIK JAKARTA STI&K </span>
  </div>
</div>
