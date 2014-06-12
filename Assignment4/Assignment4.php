<?php
	header('Content-type:text/xml');
	$rss=$_GET["rss"];

//find out which feed was selected
	$xmlFeed = new DOMDocument();
	if($rss=="Toronto") {
		$xmlFeed->load(("http://text.weatheroffice.gc.ca/rss/city/on-143_e.xml"));
	}
	else if($rss=="Calgary") {
		$xmlFeed->load(("http://text.weatheroffice.gc.ca/rss/city/ab-52_e.xml"));
	}
	else if($rss=="Hamilton") {
		$xmlFeed->load(("http://text.weatheroffice.gc.ca/rss/city/on-77_e.xml"));
	}

	//get elements from "<channel>"
	$channel=$xmlFeed->getElementsByTagName('channel')->item(0);
	$title = $channel->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
	$link = $channel->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
	$description = $channel->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;

	//output elements from "<channel>"
?>
<p><a href="<?=$link ?>"><?= $title ?></a><br /><?=$description?></p>
<?
	//get and output "<item>" elements
	$items=$xmlFeed->getElementsByTagName('item');
	for ($i=0; $i<=2; $i++) {
		$itemTitle=$items->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
		$itemLink=$items->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
		$itemDescription=$items->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
?>
<p class="items"><a href="<?=$itemLink ?>"><?= $itemTitle ?></a><br /><?=$itemDescription?></p>
<?
	}
?> 
