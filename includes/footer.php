<?php
$sqlk = $db->query("select * from kontak where id_kontak='1'");
while($rk = $sqlk->fetch(PDO::FETCH_LAZY)){
?>
<footer class="w3-center w3-theme-d5 w3-padding-16">
  <p>BEM STMIK JAKARTA STI&K &copy; 2023</p>
  <a href="<?php echo $rk['facebook']; ?>"><i class="w3-button w3-hover-white w3-hover-text-d5 fa fa-facebook fa-lg"></i></a>
  <a href="<?php echo $rk['instagram']; ?>"><i class="w3-button w3-hover-white w3-hover-text-d5 fa fa-instagram fa-lg"></i></a>
  <a href="<?php echo $rk['twitter']; ?>"><i class="w3-button w3-hover-white w3-hover-text-d5 fa fa-twitter fa-lg"></i></a>
</footer>
<?php
}
?>