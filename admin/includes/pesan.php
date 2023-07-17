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
if(!($_GET[p])){
	$no = 1;
}else{
	$no = (($p)*$batas_hal)-($batas_hal-1);
}
?>
<div class="w3-card-4 w3-white w3-margin" id="pesan" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-bell"></i> Pesan</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<div class="w3-responsive">
    <table class="w3-table-all w3-striped w3-bordered w3-border w3-white">
      <tr class="w3-blue">
        <th>no</th>
        <th>nama</th>
		<th>email</th>
		<th>isi</th>
		<th>waktu</th>
		<th>option</th>
      </tr>
	  <?php
		$sql = $db->query("select * from pesan order by id_pesan desc limit $posisi,$batas_hal");
		while($r = $sql->fetch(PDO::FETCH_LAZY)){
			$tgl = date('d F Y | H:i:s', strtotime($r['tgl_pesan']));
	  ?>
      <tr class="">
        <td><?php echo $no; ?></td>
        <td><?php echo $r['nama_pesan']; ?></td>
		<td><?php echo $r['email_pesan']; ?></td>
		<td><?php echo $r['isi_pesan']; ?></td>
		<td><?php echo $tgl ?></td>
		<td>
			<a class="w3-link" onClick="return confirm('Apakah anda yakin menghapus data ini?')" href="admin.php?page=pesan&action=delete&id=<?php echo $r['id_pesan'];?>">Delete</a>
		</td>
      </tr>
	  <?php
		$no++;
		}
	  ?>
    </table>
	</div>
	<div class="w3-section w3-center w3-padding-bottom"id="pagenation">
		<div class="w3-bar">
			<?php
			$cek_data = $db->query("select count(*) from pesan order by id_pesan ");
			$jml_data = $cek_data->fetchColumn() ;
			$jml_hal = ceil($jml_data/$batas_hal) ;
			for($i2 = 1 ; $i2 <=$jml_hal ; $i2++) {
				if($p == $i2){
			?>
				<span href="#" class="w3-button w3-blue"><?php echo $i2; ?></span>
			<?php }else{ ?>
					<a href="index.php?&page=pesan&p=<?php echo $i2; ?>" class="w3-button w3-text-blue"><?php echo $i2;?></a></li>
					<?php }
			}
			?>
		</div> 
	</div>
  </div>
</div>
<?php
if($_GET[action] == 'delete'){
	$id5 = $_GET[id];
	$sql2 = $db->query("delete pesan pesan where id_pesan='$id5'");
	if($sql2){
		echo "<script>alert('Deleted');</script>";
		echo "<script>window.location='admin.php?page=pesan'</script>"	;
	}else{
		echo "<script>alert('GAGAL');</script>";
		echo "<script>window.location='admin.php?page=pesan'</script>"	;
	}
}
?>
