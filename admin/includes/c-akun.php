<div class="w3-card-4 w3-white w3-margin" id="berita" >
  <header class="w3-container" style="padding-top:15px">
    <h3 class="w3-text-blue"><b><i class="fa fa-newspaper-o"></i> Buat Admin</b></h3>
	<hr>
  </header>
  <div class="w3-container">
	<form action="admin.php?page=c-akun&action=go" method="post"  enctype="multipart/form-data">
		<p>
		<label class="w3-text-blue w3-large">Username</label>
		<input class="w3-input w3-border" type="text" name="username">
		</p>
		<p>
		<label class="w3-text-blue w3-large">Password</label>
		<input class="w3-input w3-border" type="text" name="password">
		</p>
		<p>
		<label class="w3-text-blue w3-large">Jabatan</label>
		<select class="w3-select w3-border" name="jabatan">
			  <option value="Inkom">Inkom</option>
		</select>
		</p>
		<label class="w3-text-blue w3-large">Nickname</label>
		<input class="w3-input w3-border" type="text" name="nama">
		</p>
		<button class="w3-btn w3-blue w3-margin-bottom" type="submit">Submit</button>
	</form>
  </div>
</div>
<?php
if($_GET[action] == 'go'){
	$usernamex = trim(strip_tags($_POST[username]));
	$passwordx = trim(strip_tags($_POST[password]));
	$passwordx = md5($passwordx) ;
	$jabatanx = trim(strip_tags($_POST[jabatan]));
	$nicknamex = trim(strip_tags($_POST[nama]));
	
	if($username != "areza21"){
		echo '<script>alert ("anda tidak mempunyai hak akses untuk membuat");</script>';
		echo '<script> window.location="admin.php"</script>';
	}
	if(empty($usernamex) || empty($passwordx) || empty($jabatanx) || empty($nicknamex)){
		echo '<script>alert ("harap isi semua");</script>';
		echo '<script> window.location="#"</script>';
	}else{
	$query = $db->query("INSERT into admin values('','$usernamex','$passwordx','$nicknamex','$jabatanx')");
		if (!empty($query)) {
			echo '<script> window.location="admin.php?page=admin"</script>';
		}else{
			echo '<script>alert ("gagal membuat akun baru");</script>';
		}
	}
}
?>
