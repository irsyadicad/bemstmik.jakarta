<?php
if ($_GET[page] == "baca") {
	$id = $_GET[id];
	$sql =  $db->query("SELECT * from berita where id_berita='$id'");
	while($r = $sql->fetch(PDO::FETCH_ASSOC)) {
		$judul_seo= seo_title($r['judul_berita']);
	?>
		<title>BEM JAKSTIK - <?php echo $r['judul_berita'];?></title>

		<meta name="keywords" content="<?php echo $r['judul_berita'];?>"> 
		<meta name="description" content="<?php echo $r['deskripsi_berita'];?>"> 

		<meta property="og:url"          content="http://bem.stikjakarta.com/baca/<?php echo $r['id_berita']; ?>/<?php echo $judul_seo;?>" />
		<meta property="og:type"         content="article" />
		<meta property="og:title"        content="<?php echo $r['judul_berita'];?>" />
		<meta property="og:description"  content="<?php echo $r['deskripsi_berita'];?>" />
		<meta property="og:image"        content="http://bem.stikjakarta.com/assets/img/berita/<?php echo $r['gambar_berita']; ?>" />
		<meta property="og:type" content="metadata"/>
		<link rel="origin" href={SOURCE_URL}/>

		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@bemjakstik">
		<meta name="twitter:creator" content="@bemjakstik">
		<meta name="twitter:title" content="<?php echo $r['judul_berita'];?>" />
		<meta name="twitter:description" content="<?php echo $r['deskripsi_berita'];?>" />
		<meta name="twitter:image" content="http://bem.stikjakarta.com/assets/img/berita/<?php echo $r['gambar_berita']; ?>" />
	<?php
	}
}elseif ($_GET[page] == "info") {
	$id = $_GET[id];
	$sql =  $db->query("SELECT * from info where id_info='$id'");
	while($r = $sql->fetch(PDO::FETCH_ASSOC)) {
		$judul_seo= seo_title($r['judul_info']);
	?>
		<title>BEM JAKSTIK - <?php echo $r['judul_info'];?></title>
		<meta name="keywords" content="<?php echo $r['judul_info'];?>"> 
		<meta name="description" content="<?php echo $r['deskripsi_info'];?>"> 

		<meta property="og:url"          content="http://bem.stikjakarta.com/info/<?php echo $r['id_info']; ?>/<?php echo $judul_seo;?>" />
		<meta property="og:type"         content="article" />
		<meta property="og:title"        content="<?php echo $r['judul_info'];?>" />
		<meta property="og:description"  content="<?php echo $r['deskripsi_info'];?>" />
		<meta property="og:image"        content="http://bem.stikjakarta.com/assets/img/info/<?php echo $r['gambar_info']; ?>" />
		<meta property="og:type" content="metadata"/>
		<link rel="origin" href={SOURCE_URL}/>

		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@bemjakstik">
		<meta name="twitter:creator" content="@bemjakstik">
		<meta name="twitter:title" content="<?php echo $r['judul_info'];?>" />
		<meta name="twitter:description" content="<?php echo $r['deskripsi_info'];?>" />
		<meta name="twitter:image" content="http://bem.stikjakarta.com/assets/img/info/<?php echo $r['gambar_info']; ?>" />
	<?php
	}
}else{
?>
		<title>BEM JAKSTIK</title>
		<meta name="keywords" content="BEM STMIK JAKARTA STI&K, senat, kelembagaan, kemahasiswaan, jasktik, sti&k,"> 
		<meta name="description" content="Lembaga Eksekutif di kelembagaan kemahasiswaan kampus STMIK jakarta STI&K"> 

		<meta property="og:url"          content="http://bem.stikjakarta.com" />
		<meta property="og:type"         content="website" />
		<meta property="og:title"        content="BEM STMIK JAKARTA STI&K" />
		<meta property="og:description"  content="Lembaga Eksekutif di kelembagaan kemahasiswaan kampus STMIK jakarta STI&K" />
		<meta property="og:image"        content="http://bem.stikjakarta.com/assets/img/logo/bem-logo.png" />
		<meta property="og:type" content="metadata"/>
		<link rel="origin" href={SOURCE_URL}/>

		<meta name="twitter:card" content="summary">
		<meta name="twitter:site" content="@bemjakstik">
		<meta name="twitter:creator" content="@bemjakstik">
		<meta name="twitter:title" content="BEM JAKSTIK" />
		<meta name="twitter:description" content="Lembaga Eksekutif di kelembagaan kemahasiswaan kampus STMIK jakarta STI&K" />
		<meta name="twitter:image" content="http://bem.stikjakarta.com/assets/img/logo/bem-logo.png" />
<?php
}
?>