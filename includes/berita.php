<?php
$batas_hal = 10;
$p = $_GET[p];
if(!($_GET[p])){
	$p = 1;
	$posisi = 0;
}else{
	$p = $_GET[p];
	$posisi = ($p-1)*$batas_hal;
}

?>

<?php require("header.php"); ?>

<div class="w3-container w3-theme-d5 w3-padding-16" id="post">
	<div class="w3-row w3-center ">
		<span class="w3-h7">BERITA</span>
		<hr class="w3-hr-star">
		<i class="fa fa-star w3-star"></i>
	</div>
</div>
<!-- Container (berita Section) -->
<div class="w3-content w3-padding-24 " style="max-width:960px;" id="berita">
<?php
$sql =  $db->query("select * from berita, kategori where berita.id_kategori = kategori.id_kategori order by berita.id_berita desc limit $posisi,$batas_hal");
while($r = $sql->fetch(PDO::FETCH_ASSOC)) {
	$judul_seo= seo_title($r['judul_berita']);
?>
	<div class="w3-display-container w3-row-padding w3-border-bottom w3-section">
		<div class="w3-col m3 image-post" style="margin-top:8px">
			<img src="assets/img/berita/<?php echo $r['gambar_berita']; ?>" class="w3-image" style="width:100%;">
		</div>
		<div class="w3-col m9">
			<div class="">
				<a href="baca/<?php echo $r['id_berita']; ?>/<?php echo $judul_seo;?>" class="w3-xlarge w3-link"><?php echo $r['judul_berita']; ?></a>
			</div>
			<div class="w3-info">
				<span class=""><i class="fa fa-calendar"> </i>&nbsp; <?php echo tglberita($r['tgl_berita']); ?> &nbsp; &nbsp; &nbsp;<i class="fa fa-user"> </i> <?php echo $r['penulis']; ?> &nbsp; &nbsp; &nbsp;<i class="fa fa-th-list"> </i> <?php echo $r['nama_kategori']; ?> &nbsp; &nbsp; &nbsp;</span>
			</div>
			<div class="w3-read w3-hide-small">
				<span class=""><?php readmore($r['isi_berita'],160); ?></span>
			</div>
		</div>
	</div>
<?php
}
?>

	<div class="w3-section w3-center w3-border-bottom w3-padding-bottom"id="pagenation">
		<div class="w3-bar">
			<?php
			$cek_data = $db->query("select count(*) from berita order by id_berita ");
			$jml_data = $cek_data->fetchColumn() ;
			$jml_hal = ceil($jml_data/$batas_hal) ;
			for($i2 = 1 ; $i2 <=$jml_hal ; $i2++) {
				if($p == $i2){
			?>
				<span href="#" class="w3-button w3-theme-d1"><?php echo $i2; ?></span>
			<?php }else{ ?>
					<a href="berita/p/<?php echo $i2; ?>" class="w3-button w3-text-l1"><?php echo $i2; ?></a></li>
					<?php }
			}
			?>
		</div> 
	</div>

</div>


