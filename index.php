<?php

$url = "https://www.mobilhanem.com/test/php-dersleri/"; // web Site URL
$veri =  file_get_contents($url); // verimiz geldi

$pattern = '@<article (.*?)>(.*?)</article>@si';

preg_match_all($pattern,$veri,$yazilar);

$posts = array();
for($i=0;$i<count($yazilar[0]);$i++) {
	// başlığı ve url alıyoruz.
	$baslikPattern = '@<a itemprop="url" href="(.*?)" (.*?)>(.*?)</a>@si';
	preg_match($baslikPattern,$yazilar[0][$i],$baslik);
	
	// resimi alıyoruz. 
	$resimPattern = '@<img alt="(.*?)" width="250" height="160" src="(.*?)">@si';
	preg_match($resimPattern,$yazilar[0][$i],$resim);
	
	
	
	// posts diye bir diziye verileri atalım daha sonra kendimiz ayarlayalım. 
	
	$posts[$i]["baslik"] = $baslik[3];
	$posts[$i]["post_url"] = $baslik[1];
	$posts[$i]["resim"] = $resim[2];
}


/// alınan verileri ekranda gösteriyoruz. 
echo '<ul style="list-style:none;">';
foreach( $posts as $post) {
	echo ' <li> <img src="'.str_replace('./',$url,$post["resim"]).'" alt="" /> <a href="post_detay.php?url='.$post["post_url"].'">'.$post["baslik"]."</a></li>";
}
echo '</ul>';
?>

<style type="text/css">
	ul li {
		display:block;
		border-bottom:1px solid #333;
		margin:5px 0;
	}
	a {
		text-decoration:none;
	}
</style>