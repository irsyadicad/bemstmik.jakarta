<?php
$id = $_GET[id];
$sql = $db->query("select * from kegiatan where id_kegiatan='$id'");
while ($r = $sql->fetch(PDO::FETCH_LAZY)){
$idkm = $r['id_kegiatan'];
?>
<div class="w3-card-4 w3-white w3-margin" id="dokumentasi" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Dokumentasi <?php echo $r['nama_kegiatan']; ?></b></h3>
	<hr>
  </header>
  <div class="w3-container w3-panel w3-pale-blue w3-leftbar w3-border-blue w3-margin">
	<form action="admin.php?page=dokumentasi&id=<?php echo $r['id_kegiatan']; ?>&action=go" method="post"  enctype="multipart/form-data">
		<h4><b>Upload Foto KM</b></h4> 
		<p>
		<input class="" type="hidden" name="id_km" value="<?php echo $r['id_kegiatan']; ?>">
		<input class="" type="file" accept="image/*" name="data1">
		Info Gambar : <input class="w3-border-0" style="width:100%; max-width:300px" type="text" name="info1"></p>
		<p>
		<input class="" type="file" accept="image/*" name="data2">
		Info Gambar : <input class="w3-border-0" style="width:100%; max-width:300px" type="text" name="info2"></p>
		<p>
		<input class="" type="file" accept="image/*" name="data3">
		Info Gambar : <input class="w3-border-0" style="width:100%; max-width:300px" type="text" name="info3"></p>
		<p>
		<input class="" type="file" accept="image/*" name="data4">
		Info Gambar : <input class="w3-border-0" style="width:100%; max-width:300px" type="text" name="info4"></p>
		<p>
		<input class="" type="file" accept="image/*" name="data5">
		Info Gambar : <input class="w3-border-0" style="width:100%; max-width:300px" type="text" name="info5"></p>
		</p>
		<button class="w3-btn w3-blue w3-margin-bottom" type="submit">Submit</button>
	</form>
  </div>
  <div class="w3-container" id="fotokm">
  <div class="w3-row-padding w3-section">
	<?php
	$sql = $db->query("select * from dokumentasi where id_kegiatan='$idkm' order by id_dokumentasi desc");
	while($r = $sql->fetch(PDO::FETCH_LAZY)){
	?>
	<div class="w3-col m4 w3-center w3-section">
	<div class="w3-container w3-card-4 w3-white w3-no-padding">
		<div class="img-thumb">
			<?php list($width, $height, $type, $attr) = getimagesize("../assets/img/dokumentasi/".$r['gambar_dokumentasi']);
				if($width > $height){
					$kotak = "landscape";
				}else{
					$kotak = "portrait";
				}
			?>
			<img src="../assets/img/dokumentasi/<?php echo $r['gambar_dokumentasi']; ?>" alt="Avatar" class="<?php echo $kotak; ?>">
		</div>
		<div class="w3-container w3-pale-blue">
			<p><?php echo $r['info_dokumentasi']; ?> &nbsp;</p>
		</div>
		<div class="w3-container w3-no-padding w3-border-top">
			<a onClick="return confirm('Apakah anda yakin menghapus data ini?')" href="admin.php?page=dokumentasi&action=delete&id=<?php echo $id;?>&no=<?php echo $r['id_dokumentasi'];?>" style="text-decoration:none; width:50%;" class="w3-button w3-red w3-right">Delete</a>
			<a onclick="document.getElementById('<?php echo $r['id_dokumentasi'];?>').style.display='block'" style="text-decoration:none; width:50%;" class="w3-button w3-green w3-right">Edit Caption</a>
		</div>
	</div>
	</div>
	
	<div id="<?php echo $r['id_kegiatan'];?>" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('<?php echo $r['id_kegiatan'];?>').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
      </div>

      <form class="w3-container" action="admin.php?page=dokumentasi&action=save&id=<?php echo $id;?>&no=<?php echo $r['id_kegiatan'];?>" method="post">
        <div class="w3-section">
          <label><b>Caption</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" value="<?php echo $r['info_dokumentasi'];?>" name="infox" required>
          <input class="" type="hidden" name="idx" value="<?php echo $r['id_kegiatan']; ?>">
		  <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Save</button>
        </div>
      </form>

    </div>
	</div>
	<?php
	}
	?>
  </div>
  </div> 
</div>
<?php
}
?>

	<?php
	if($_GET[action] == 'save'){
		$infox = trim(strip_tags($_POST[infox]));
		$idx = trim(strip_tags($_POST[idx]));

		if (empty($infox)){
			echo '<script>alert ("harap isi semua");</script>';
			echo '<script> window.location="#"</script>';
		}else{
		$queryx = $db->query("update dokumentasi set info_dokumentasi='$infox' where id_dokumentasi='$idx'");
		if (!empty($queryx)) {
			echo '<script> window.location="admin.php?page=dokumentasi&id='.$id.'"</script>';
			}else{
			echo '<script>alert ("gagal update info");</script>';
			}
		}
	}
	?>

<?php
if($_GET[action] == 'go'){
$id5 = $_GET[id];
$id_km= trim(strip_tags($_POST[id_km]));

	$fileName1 = $_FILES['data1']['name']; //get the file name
	if(!empty($fileName1)){
	$info1 = trim(strip_tags($_POST[info1]));
	$kode1 = rand(0000,9999);
	$wow1 = "["."$kode1"."]_"."$id_km"."_bem-jakstik_"."$fileName1";
	$move1 = move_uploaded_file($_FILES['data1']['tmp_name'], '../assets/img/dokumentasi/'.$wow1); //save image to the folder
	$query1 = $db->query("insert into dokumentasi values ('','$id_km','$wow1','$info1')");
	}
	$fileName2 = $_FILES['data2']['name']; //get the file name
	if(!empty($fileName2)){
	$info2 = trim(strip_tags($_POST[info2]));
	$kode2 = rand(0000,9999);
	$wow2 = "["."$kode2"."]_"."$id_km"."_bem-jakstik_"."$fileName2";
	$move2 = move_uploaded_file($_FILES['data2']['tmp_name'], '../assets/img/dokumentasi/'.$wow2); //save image to the folder
	$query2 = $db->query("insert into dokumentasi values ('','$id_km','$wow2','$info2')");
	}
	$fileName3 = $_FILES['data3']['name']; //get the file name
	if(!empty($fileName3)){
	$info3 = trim(strip_tags($_POST[info3]));
	$kode3 = rand(0000,9999);
	$wow3 = "["."$kode3"."]_"."id_km"."_bem-jakstik_"."$fileName3";
	$move3 = move_uploaded_file($_FILES['data3']['tmp_name'], '../assets/img/dokumentasi/'.$wow3); //save image to the folder
	$query3 = $db->query("insert into dokumentasi values ('','$id_km','$wow3','$info3')");
	}
	$fileName4 = $_FILES['data4']['name']; //get the file name
	if(!empty($fileName4)){
	$info4 = trim(strip_tags($_POST[info4]));
	$kode4 = rand(0000,9999);
	$wow4 = "["."$kode4"."]_"."$id_km"."_bem-jakstik_"."$fileName4";
	$move4 = move_uploaded_file($_FILES['data4']['tmp_name'], '../assets/img/dokumentasi/'.$wow4); //save image to the folder
	$query4 = $db->query("insert into dokumentasi values ('','$id_km','$wow4','$info4')");
	}
	$fileName5 = $_FILES['data5']['name']; //get the file name
	if(!empty($fileName5)){
	$info5 = trim(strip_tags($_POST[info5]));
	$kode5 = rand(0000,9999);
	$wow5 = "["."$kode5"."]_"."$id_km"."_bem-jakstik_"."$fileName5";
	$move5 = move_uploaded_file($_FILES['data5']['tmp_name'], '../assets/img/dokumentasi/'.$wow5); //save image to the folder
	$query5 = $db->query("insert into dokumentasi values ('','$id_km','$wow5','$info5')");
	}
		
	echo '<script> window.location="admin.php?page=dokumentasi&id='.$id5.'"</script>';
}
?>
<?php
if($_GET[action] == 'delete'){
	$no7 = $_GET[no];
	$sql7 = $db->query("delete from dokumentasi where id_dokumentasi='$no7'");
	if($sql7){
		echo "<script>alert('Deleted');</script>";
		echo "<script>window.location='admin.php?page=dokumentasi&id=".$id."'</script>"	;
	}else{
		echo "<script>alert('GAGAL');</script>";
		echo "<script>window.location='admin.php?page=dokumentasi&id=".$id."'</script>"	;
	}
}
?>