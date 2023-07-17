<?php
$page = isset($_REQUEST['page']) ? $_REQUEST['page']:'home';
$include_page = "includes/".$page.".php";
if(!file_exists($include_page)){
	echo "<script>window.location='index.php'</script>";	
}
?>