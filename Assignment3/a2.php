<!--// Brydon Eastman Assignment 2 //-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--// W3C Recommended the above doctype //-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		<title>Assignment 2</title>
		<link rel="stylesheet" href="a2-styles.css" />
	</head>
	<body>
<?php 
		$colours = array("blue","red","green");
		for ($i = 1; $i<=12; $i++) {
?>		<div class="tTable">
<?
	for ($j = 1; $j<=12; $j++) {
?>
<?= "			<p class=\" ". $colours[$i%3] ." \"> $i x $j is ". $i*$j ."</p>\n" ?>
<?}?>
		</div>
<?}?>	
		<br /><table>
			<tr style="background-color:#333">
				<td>Exponent</td>
				<td>2</td>
				<td>3</td>
				<td>4</td>
				<td>5</td>
			</tr>
<?
for ($i = 1; $i<=10; $i++) {
?>
			<?= "<tr>\n				<td style=\"background-color:#666;\">Base: ".$i."</td>" ?>
<? $red=array(2=>"FF",3=>"88",4=>"44",5=>"00");
				$green=array(2=>"00",3=>"44",4=>"88",5=>"FF");
				$blue=array("00","1C","38","54","70","8C","A8","C4","E0","FC");
				for ($j = 2; $j<=5; $j++) {
				$r = (int) (255-($j-2)*255/3);
				$g = (int) (($j-2)*255/3);
				$b = (int) (($i-1)*255/9);
?>
<?= "\n				<td style=\"background-color:rgba(". $r .",". $g .",". $b .",1)\">".pow($i,$j)."</td>" ?>
<?
			}
			?><?="\n			</tr>\n"?><?
		}
?>
		</table>
		<span class="w3links"><a href="http://validator.w3.org/check/referer" target="_blank"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML" /></a>&nbsp;<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS" /></a></span>
	</body>
</html>
