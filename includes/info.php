
<?php require("header.php"); ?>

<div class="w3-container w3-theme-d5 w3-padding-16" id="post">
	<div class="w3-row w3-center ">
		<span class="w3-h7">Pengumuman</span>
		<hr class="w3-hr-star">
		<i class="fa fa-star w3-star"></i>
	</div>
</div>
<!-- Container (info Section) -->
<?php
$id = $_GET[id];
$sql =  $db->query("select * from info where id_info='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
	$xlink = "http://bem.stikjakarta.com/info/".$r['id_info']."/".$judul_seo;
?>
<div class="w3-content w3-padding-16 w3-border-left w3-border-right" style="max-width:600px;" id="info">

	<div class="w3-row-padding w3-margin">
	
		<!-- JUDUL -->
		<div class="w3-section" >
			<span href="#" class="w3-xlarge w3-link"><?php echo $r['judul_info']; ?> </span>
		</div>
		<!-- INFO -->
		<div class="w3-section w3-info">
				<span class=""><i class="fa fa-calendar"> </i> <?php echo tglberita($r['tgl_info']); ?> &nbsp; &nbsp; &nbsp;<i class="fa fa-user"> </i> <?php echo $r['penulis']; ?> &nbsp; &nbsp; &nbsp;<i class="fa fa-th-list"> </i> Pengumuman &nbsp; &nbsp; &nbsp;</span>
		</div>
		
		<!-- GAMBAR PHONE -->
		<div class="w3-center w3-hide-medium w3-hide-large" >
			<img src="assets/img/info/<?php echo $r['gambar_info']; ?>" class="w3-image " style="width:100%;">
		</div>
		<!-- GAMBAR WEB -->
		<div class="w3-center w3-hide-small" >
			<img src="assets/img/info/<?php echo $r['gambar_info']; ?>" class="w3-image w3-card-4 w3-hover-opacity" style="width:100%; max-width:480px;" onclick="document.getElementById('modal01').style.display='block'" >
		</div>
		<!-- GAMBAR MODAL -->
		<div id="modal01" class="w3-modal  w3-center" onclick="this.style.display='none'">
		  <img class="w3-modal-content w3-animate-zoom" src="assets/img/info/<?php echo $r['gambar_info']; ?>" style="width:100%; max-width:960px;">
		</div>
		
		<!-- SHARE -->
		<div class="w3-center" style="margin-top: 16px;">

			<div class="w3-left" style="margin-right: 10px;">
				<b>share to : </b>
			</div>

			<div class="w3-left">
			<div class="fb-share-button" data-href="<?php echo $xlink; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $xlink; ?>" class="fb-xfbml-parse-ignore">Bagikan</a></div>
			</div>

			<div class="w3-left" style="margin: 2px 6px;"><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=BEM JASKTIK - <?php echo $r['judul_info']; ?>">
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
			Tweet</a></div>

			<div class="w3-left" style="margin: -1px 0px;"><a href="whatsapp://send?text=<?php echo $xlink; ?>"><img src="assets/img/share-wa.png" height="20px;"></a></div>

		</div>

		<!-- ISI -->
		<div class="w3-padding-24 w3-read ">
			<?php echo $r['isi_info']; ?>	
		</div>

		<div class="w3-section">
			<div class="fb-comments" data-href="<?php echo $xlink; ?>" data-width="100%" data-numposts="5"></div>
		</div>
	</div>

</div>
<?php
}
?>