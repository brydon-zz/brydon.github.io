<!--// Brydon Eastman Assignment 3 //-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--// W3C Recommended the above doctype //-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Assignment 3</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="a2-styles.css" />
		<script type="text/javascript" src="a3script.js"></script>
	</head>
	<body>
		<form action="a3.php" method="get">
			<fieldset>
				<p class="table">Enter an exponent between 1 and 7 and a base between 1 and 100.</p>
				<label>Max Exponent: </label><input id="exponent" name="exponent" type="text"></input><br />
				<p class="warning" id="expWarning">Make sure your exponent is between 1 and 7.</p>
				<label>Max Base: </label><input id="base" name="base" type="text"></input><br />
				<p class="warning" id="baseWarning">Make sure your base is between 1 and 100.</p>
				<input type="submit" id="button" disabled="disabled" value="Submit"></input>
			</fieldset>
		</form>
<?php 
	if (isset($_GET['base']) &&  isset($_GET['exponent'])) {
			$base = $_GET["base"];
		$exponent = $_GET["exponent"];
?>
		<table>
			<tr class="row1">
				<td>Exponent</td>
<? for ($i = 0; $i<=$exponent; $i++) { ?>
				<td><?= $i ?></td>
<?}?>
			</tr>
<?
for ($i = 1; $i<=$base; $i++) {
?>
			<tr>
				<td class="col1">Base: <?=$i?></td>
<?
				for ($j = 0; $j<=$exponent; $j++) {
				$r = (int) (255-($j)*255/($exponent));
				$g = (int) (($j)*255/($exponent));
				$b = $base == 1 ? 0 : (int) (($i-1)*255/($base-1));
?>
				<td style="background-color:rgba(<?= $r .','. $g .','. $b .',1);">'.pow($i,$j) ?> </td>
<?
			}
			?>
			</tr><?
		}
?>
		</table><? } ?>
<?
		$hits = (int) file_get_contents("hitCounter.txt");
		file_put_contents("hitCounter.txt",$hits+1);
?>
		<p class="hits">You are visitor number <?=$hits+1?>!</p>
		<span class="w3links"><a href="http://validator.w3.org/check/referer" target="_blank"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML" /></a>&nbsp;<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS" /></a></span>
	</body>
</html>