<?php

$urlGelen = isset($_GET["url"]) ? addslashes($_GET["url"]) : ""; // eğer bir gelen url varsa alalım yoksa boş kalsın.

$url = "https://www.mobilhanem.com/test/php-dersleri/$urlGelen"; // web Site URL
$veri =  file_get_contents($url); // verimiz geldi


// şimdi içerikten başlık ve yazıyı alalım. 

// başlığı aldık
$baslikPattern = '@<h2 itemprop="name" class="post-title">(.*?)</h2>@si';
preg_match($baslikPattern,$veri,$baslik);


$yaziPattern = '@<div class="post-content" itemprop="mainContentOfPage">(.*?)<div class="clearfix">@si';
preg_match($yaziPattern,$veri,$yazi);

?>
<div style="width:700px;margin:0 auto;">
	<h1><?=strip_tags($baslik[0])?></h1>
	<?php echo $yazi[0];?>
</div>