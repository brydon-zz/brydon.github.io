<html>
	<head>
		<title>A PHP Test!</title>
	</head>
	<body style="background-color:#000;color:#FFF;">
		<p>Let's count to 100!</p>
		<p>
		<?php 
		for ($a = 1; $a<=100; $a++) {
		?>
		And a <?= $a ?>, 
		<?}?>
		</p>
		<p> Perfect! Now let us foobar</p>
		<? for ($a=1;$a<=100;$a++){?>
			<?=$a?>
			<? if ($a%5==0) {?>foo<?}
			if ($a%3==0) {?>bar<?}
		}?>
		<? for ($a=1;$a<=$_REQUEST['n'];$a++){?>
		<marquee scrollamount="20" style="position:absolute;top:<?=20*$a?>px;left:0px;" direction="<? if ($a%2) { ?> <?= 'left' ?><? } else {?><?= 'right' ?><?}?>"><blink><p>
			<h<?=(int)7-ceil(6*$a/$_REQUEST['n'])?> style="background-color:#FF0;font-variant:small-caps;"><b><i><font color="#F0F">my name is <?= $_REQUEST['name']?></font></i></b></h<?=(int)7-ceil(6*$a/$_REQUEST['n'])?>></p></blink></marquee>
		<?}?>
		<? for ($a=1;$a<=$_REQUEST['w'];$a++){?>
			<img src="http://www.worldwideprayer.com/images/235_large-spinning-globe1.gif" />
		<?}?>
		<p>
		<? 
		$r = explode(" ",file_get_contents("wp.txt"));
		?>
		<?=implode("<img src=\"http://www.chow.com/uploads/6/6/2/385266_smiley_face_tiny.jpeg\" />",$r)?>
		</p>
	</body>
</html>
