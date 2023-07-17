
<?php require("header.php"); ?>
<?php
$id = $_GET[id];
$sql = $db->query("SELECT * from km where nama_km ='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
$idkm = $r['id_km'];
?>
<div class="w3-container w3-content w3-padding-24" style="max-width:960px;">    
  <!-- The Grid -->
  <div class="w3-row-padding">
    <!-- Left Column -->
    <div class="w3-col m4">
      <!-- Profile -->
      <div class="w3-container w3-card-4 w3-white w3-round w3-no-padding w3-center w3-margin-bottom ">
         <header class="w3-container w3-blue w3-hover-d7">
			<h3><?php echo $r['nama_km']; ?></h3>
		 </header>
         <p class="w3-center"><img src="assets/img/logo/<?php echo $r['logo_km']; ?>" class="w3-image" style="width:100%; max-width:240px" alt="Avatar"></p>
		 <div class="w3-left-align w3-margin">
         <hr>
         <p><b class="w3-text-d5">Divisi KM</b> : <?php echo $r['divisi_km']; ?></p>
         <p><b class="w3-text-d5">Ketua KM</b> : <?php echo $r['ketua_km']; ?></p>
         <p><b class="w3-text-d5">Kontak KM</b> : <?php echo $r['kontak_km']; ?></p>
		 </div>
      </div>
     
      <!-- Accordion -->
      
      <!-- Interests 
      <div class="w3-container w3-card-4 w3-white w3-hide-small w3-margin-bottom w3-no-padding">
		<header class="w3-container w3-blue w3-hover-d7">
		<h4>Tertarik pada</h4>
		</header>
		<div class="w3-margin" style="">
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
		</div>
      </div>
	   -->
      
          
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m8">
		<div class="w3-container w3-card-4 w3-white w3-round w3-no-padding">
			<header class="w3-container w3-blue w3-hover-d7">
			<h4>Tentang Kami</h4>
			</header>
			<div class="w3-margin" style="">
			<p><?php echo $r['profil_km']; ?></p>
			</div>
		</div>
		
		<div class="w3-container w3-card-4 w3-white w3-round w3-margin-top w3-no-padding" id="fotokm">
			<header class="w3-container w3-blue w3-hover-d7">
			<h4>Photo</h4>
			</header>
			<div class="w3-content w3-display-container">
				<?php
				$sqlp = $db->query("SELECT * from fotokm where id_km='$idkm' order by id_fotokm desc");
				while($rp = $sqlp->fetch(PDO::FETCH_LAZY)){
				?>
				<div class="w3-display-container mySlides">
				  <div class="img-thumb">
					<?php list($width, $height, $type, $attr) = getimagesize("assets/img/fotokm/".$rp['gambar_fotokm']);
						if($width > $height){
							$kotak = "landscape";
						}else{
							$kotak = "portrait";
						}
					?>
				    <img src="assets/img/fotokm/<?php echo $rp['gambar_fotokm']; ?>" class="<?php echo $kotak; ?>">
				  </div>
				  <div class="w3-display-bottomright w3-container w3-black" style="padding:8px; background:rgba(0,0,0,0.6) !important;">
					<?php echo $rp['info_fotokm']; ?>&nbsp;
				  </div>
				</div>
				<?php
				}
				?>			

				<button class="w3-button w3-display-left w3-black" style="background:rgba(0,0,0,0.6) !important;" onclick="plusDivs(-1)">&#10094;</button>
				<button class="w3-button w3-display-right w3-black" style="background:rgba(0,0,0,0.6) !important;" onclick="plusDivs(1)">&#10095;</button>
			</div>
		</div>
		<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
		  showDivs(slideIndex += n);
		}

		function showDivs(n) {
		  var i;
		  var x = document.getElementsByClassName("mySlides");
		  if (n > x.length) {slideIndex = 1}    
		  if (n < 1) {slideIndex = x.length}
		  for (i = 0; i < x.length; i++) {
		     x[i].style.display = "none";  
		  }
		  x[slideIndex-1].style.display = "block";  
		}
		</script>
		
		<div class="w3-container w3-card-4 w3-white w3-round w3-margin-top w3-no-padding">
			<header class="w3-container w3-blue w3-hover-d7">
			<h4>Prestasi</h4>
			</header>
			<div class="w3-responsive w3-margin">
			<table class="w3-table-all w3-striped w3-border w3-margin-bottom">
				<tr class="w3-blue">
				  <th>Nama Prestasi</th>
				  <th>Tingkat</th>
				  <th>Tahun</th>
				  <th>Keterangan</th>
				  <th>Penyelenggara</th>
				</tr>
				<?php
				$sql =  $db->query("SELECT * from prestasi, km where prestasi.id_prestasi = km.id_km and prestasi.id_km='$idkm' order by prestasi.waktu desc");
				while ($r = $sql->fetch(PDO::FETCH_LAZY)){
				?>
				<tr>
				  <td><a href="<?php echo $r['link']; ?>"><?php echo $r['nama_prestasi']; ?></td>
				  <td><?php echo $r['tingkat']; ?></td>
				  <td><?php echo tglberita($r['waktu']); ?></td>
				  <td><?php echo $r['keterangan']; ?></td>
				  <td><?php echo $r['panitia']; ?></td>
				</tr>
				<?php
				}
				?>
			</table>
			</div>
		</div>
	
	<!-- 
      <div class="w3-container w3-card-4 w3-white w3-round"><br>
        <img src="assets/img/logo/logo-sjfc.png" alt="Avatar" class="w3-left w3-image w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 min</span>
        <h4>SJFC</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="assets/img/kegiatan/26.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="assets/img/kegiatan/31.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div>
      
    End Middle Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<?php
}
?>
