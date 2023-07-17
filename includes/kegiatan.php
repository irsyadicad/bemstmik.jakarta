
<?php require("header.php"); ?>
<div class="w3-container w3-theme-d5 w3-padding-16" id="post">
	<div class="w3-row w3-center ">
		<span class="w3-h7">Program Kerja</span>
		<hr class="w3-hr-star">
		<i class="fa fa-star w3-star"></i>
	</div>
</div>
<!-- Container (berita Section) -->
<?php
$id = $_GET[id];
$sql = $db->query("SELECT * from kegiatan where id_kegiatan='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
?>
<div class="w3-content  w3-border-left w3-border-right" style="max-width:600px;" id="berita">

	<div class="w3-row-padding ">
	
		<!-- JUDUL -->
		<div class="w3-section w3-center" >
			<h2 href="#" class=" w3-link"><?php echo $r['nama_kegiatan']; ?> </h2>
		</div>
		<!-- INFO -->

		
		<!-- GAMBAR PHONE -->
		<div class="w3-center w3-hide-medium w3-hide-large" >
			<img src="assets/img/kegiatan/<?php echo $r['gambar_kegiatan']; ?>" class="w3-image " style="width:100%;">
		</div>
		<!-- GAMBAR WEB -->
		<div class="w3-center w3-hide-small" >
			<img src="assets/img/kegiatan/<?php echo $r['gambar_kegiatan']; ?>" class="w3-image w3-card-4 w3-hover-opacity" style="width:100%; max-width:240px;" onclick="document.getElementById('modal02').style.display='block'" >
		</div>
		<!-- GAMBAR MODAL -->
		<div id="modal02" class="w3-modal  w3-center" onclick="this.style.display='none'">
		  <img class="w3-modal-content w3-animate-zoom" src="assets/img/kegiatan/<?php echo $r['gambar_kegiatan']; ?>" style="width:100%; max-width:960px;">
		</div>
		
		<!-- ISI -->
		<div class="w3-padding-24 w3-read ">
			<?php echo $r['isi_kegiatan']; ?>	
		</div>
	</div>
	<?php
		$cek_data = $db->query("SELECT * from dokumentasi where id_kegiatan='$id'");
		$jml_data = $cek_data->fetchColumn() ;
		$grid1 = $jml_data % 3 ;
	?>
	<div class="w3-row" id="dokumentasi">
		<div class="w3-third">
		<?php
		$x = 1;
		$sqlp = $db->query("SELECT * from dokumentasi where id_kegiatan='$id' order by id_dokumentasi desc");
		while($rp = $sqlp->fetch(PDO::FETCH_ASSOC)) {
		$y = $x % 3;
		if($y == 1){
		?>
		  <img src="assets/img/dokumentasi/<?php echo $rp['gambar_dokumentasi']; ?>" style="width:100%" onclick="onClick(this)" alt="<?php echo $rp['info_dokumentasi']; ?>">
		<?php
		}
		$x++;
		}
		?>
		</div>
		
		<div class="w3-third">
		<?php
		$x = 1;
		$sqlp = $db->query("select * from dokumentasi where id_kegiatan='$id' order by id_dokumentasi desc");
		while($rp = $sqlp->fetch(PDO::FETCH_ASSOC)) {
		$y = $x % 3;
		if($y == 2){
		?>
		  <img src="assets/img/dokumentasi/<?php echo $rp['gambar_dokumentasi']; ?>" style="width:100%" onclick="onClick(this)" alt="<?php echo $rp['info_dokumentasi']; ?>">
		<?php
		}
		$x++;
		}
		?>
		</div>
		
		<div class="w3-third">
		<?php
		$x = 1;
		$sqlp = $db->query("select * from dokumentasi where id_kegiatan='$id' order by id_dokumentasi desc");
		while($rp = $sqlp->fetch(PDO::FETCH_ASSOC)) {
		$y = $x % 3;
		if($y == 0){
		?>
		  <img src="assets/img/dokumentasi/<?php echo $rp['gambar_dokumentasi']; ?>" style="width:100%" onclick="onClick(this)" alt="<?php echo $rp['info_dokumentasi']; ?>">
		<?php
		}
		$x++;
		}
		?>
		</div>

	</div>
	  <!-- Modal for full size images on click-->
	  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
		<span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
		<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
		  <img id="img01" class="w3-image">
		  <p id="caption"></p>
		</div>
	  </div>

</div>
<?php
}
?>