<?php
error_reporting(E_ERROR);
echo "mulai dw <br>";
$content = file_get_contents("http://partner.dw.com/syndication/feeds/VAS_Ind_Inovator_RadioElshinta.26467-media.xml ");
//$x = new SimpleXmlElement($content,);
//$x = new SimpleXmlElement($content, NULL, TRUE);
try { $x = simplexml_load_string($content); 
echo "masuk dw <br>";
foreach ($x->channel->item as $rss) {
	echo "looping dw <br>";
    $judul          = $rss->title;
   
    echo $judul."<br>===================<br>";

}

} catch (Exception $e) { echo $e; }
?>

