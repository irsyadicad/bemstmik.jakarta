<!-- First Parallax Image with Logo Text -->
<div class="bgimg-3 w3-display-container" id="home">
  <div class="w3-display-middle w3-banner">

  		<div class="w3-container w3-center " style="margin-top:40px;">
  			<?php if($_GET[id] == "SJFC"){ ?>
				<img src="assets/img/header/logo-sjfc-long.png" class="w3-image" style="width:100%;max-width:600px" alt="logo SJFC">
			<?php }elseif($_GET[id] == "TAEKWONDO"){ ?>	
				<img src="assets/img/header/logo-taekwondo-long.png" class="w3-image" style="width:100%;max-width:600px" alt="logo TAEKWONDO">
			<?php }elseif($_GET[id] == "VOSTA"){ ?>
				<img src="assets/img/header/logo-vosta-long.png" class="w3-image" style="width:100%;max-width:600px" alt="logo VOSTA">
			<?php }elseif($_GET[id] == "BAMSTIK"){ ?>
				<img src="assets/img/header/logo-bamstik-long.png" class="w3-image" style="width:100%;max-width:600px" alt="logo BAMSTIK">
			<?php }elseif($_GET[id] == "KOMPUTIKA"){ ?>
				<img src="assets/img/header/logo-komputika-long.png" class="w3-image" style="width:100%;max-width:600px" alt="logo KOMPUTIKA">
			<?php }elseif($_GET[id] == "PO"){ ?>
				<img src="assets/img/header/logo-po-long.png" class="w3-image" style="width:100%;max-width:600px" alt="logo PO">
  			<?php }else{ ?>
				<img src="assets/img/header/logo-bem-long.png" class="w3-image" style="width:100%;max-width:600px" alt="logo bem">
			<?php } ?>
	    </div>
		<h3 class="w3-center w3-padding-large  w3-large w3-text-white">Sinergis - Positif - Aktif</h3>

  </div>
</div>