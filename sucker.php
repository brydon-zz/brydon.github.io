<!DOCTYPE html>
<html>
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/12sp/labs/4/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php if (!$_POST["name"] or !$_POST["section"] or !$_POST["cc"] or !$_POST["num"]) {
		?>
			<?="<p>YOU FORGOT SOMETHING YOU MUST BE SOME KINDA STUPID</p>"?>
		<? } else {
			$current = file_get_contents("suckers.txt");
			$current .= "<br />".$_POST["name"].";".$_POST["section"].";".$_POST["cc"].";".$_POST["num"];
			file_put_contents("suckers.txt",$current);
		?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded and sent to Dr. Guantanamo (of Guantanamo Bay).</p>

		<dl>
			<dt>Name</dt>
			<dd><?=$_POST["name"]?></dd>

			<dt>Section</dt>
			<dd><?=$_POST["section"]?></dd>

			<dt>Credit Card</dt>
			<dd>A <?=$_POST["cc"]?> with number <?=$_POST["num"]?></dd>
		</dl>
		<?= $current ?>
		<? }?>
	</body>
</html>  
