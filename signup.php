<?php
session_start();
if (isset($_POST['username'])) {
	$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");

	$userName = $db->quote($_POST['username']);
	$password = $db->quote($_POST['password']);
	$email = $db->quote($_POST['email']);
	$notTaken = true;

	foreach($db->quote("SELECT * FROM users WHERE name=$userName") as $u) {
		$notTaken = false;
	}
	$userName = strip_tags($userName);
	$userName = preg_replace("/&#?[a-z0-9]{2,8};/i","",$userName);
	if(preg_replace("/^'[a-zA-Z0-9]+'$/",0,1,$userName)==1 or $userName == '')$notTaken=false;
	$password = strip_tags($password);
	$password = preg_replace("/&#?[a-z0-9]{2,8};/i","",$password);	
	if(strlen($password)<=6)$notTaken=false;
	if ($notTaken) {
		$db->query("INSERT INTO users (name,password,email) VALUES($userName,$password,$email)");
		$_SESSION['username'] = $_POST['username'];
//	$_SESSION['uid'] = $db->query("SELECT id FROM users WHERE name=$userName");
	}
	header('Location: index.php');
} else {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--// W3C Recommended the above doctype //-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/png" href="favicon.ico" />
		<title>Sign Up - Brydon Eastman Assignment CSC241</title>
		<meta name="description" content="A site with Comedy, Comics, and Videos."  />
		<meta name="keywords" content="Brydon, Eastman, BrydonEastman, Funny, Articles, Comics" />
		<link rel="stylesheet" href="styles/a1-styles.css" type="text/css" />
		<script type="application/javascript" src="signupJs.js"></script>
	</head>
	<body id="bod" class="main">
		<div id="cont">
			<div id="men">
				<div class="home"><a href="index.php" title="Home"><img class="men" alt="home" src="images/pix.png" /></a></div>
				<div class="articles"><a href="articles.php?a=1" title="Articles"><img class="men" alt="articles" src="images/pix.png" /></a></div>
				<div class="videos"><a href="videos.php" title="Videos"><img class="men" alt="videos" src="images/pix.png" /></a></div>
				<div class="about"><a href="bio.php" title="About"><img class="men" alt="about" src="images/pix.png" /></a></div>
			</div>
			<div id="head">
				<div id="hclick"><a href="index.php" title="BrydonEastman.info"><img alt="home" title="Home" src="images/pix.png" /></a></div>
			</div>
			<div id="headunder"></div>
			<div id="mid">
				<div id="midcont">
					<div id="leftmid">
						<div id="bio">
							<h1>Sign Up</h1>
								<form id="signupForm" method="post" action="signup.php">
									<div>
										Username:<br />
										Password:<br />
										Re-Enter Password:<br />
										Email Address:
									</div>
									<div>
										<input name="username" id="username" type="text" /><span id="usernameout"></span><br />
										<input name="password" id="password1" type="password" /><span id="passwordout"></span><br />
										<input name="password2" id="password2" type="password" /><span id="password2out"></span><br />
										<input name="email" id="email" type="text" /><span id="emailout"></span><br />
									</div>
								</form>
								<div id="flash">
										<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="500" height="300" id="pong" align="middle">
											<param name="movie" value="pong.swf" />
											<param name="quality" value="high" />
											<param name="bgcolor" value="#ffffff" />
											<param name="play" value="true" />
											<param name="loop" value="true" />
											<param name="wmode" value="window" />
											<param name="scale" value="showall" />
											<param name="menu" value="true" />
											<param name="devicefont" value="false" />
											<param name="salign" value="" />
											<param name="allowScriptAccess" value="sameDomain" />
											<!--[if !IE]>-->
											<object type="application/x-shockwave-flash" data="pong.swf" width="500" height="300">
												<param name="movie" value="pong.swf" />
												<param name="quality" value="high" />
												<param name="bgcolor" value="#ffffff" />
												<param name="play" value="true" />
												<param name="loop" value="true" />
												<param name="wmode" value="window" />
												<param name="scale" value="showall" />
												<param name="menu" value="true" />
												<param name="devicefont" value="false" />
												<param name="salign" value="" />
												<param name="allowScriptAccess" value="sameDomain" />
										<!--<![endif]-->
										<a href="http://www.adobe.com/go/getflash">
											<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
									</a>
									<!--[if !IE]>-->
							</object>
						<!--<![endif]-->
					</object></div>
							<div></div>
							</div>
								
							</div>
							<div id="rightmid">
								<a href="bio.php" title="Brydon's Bio"><img src="images/brydon.jpg" alt="Brydon Eastman"  /></a>
								<p>Brydon Eastman is a university student in Ancaster, Ontario.</p>
								<hr />
								<ul>
									<li><a href="http://www.xkcd.com" target="_blank" title="XKCD - The nerds staple comic">XKCD</a><br /></li>
									<li><a href="http://www.nasa.gov/mission_pages/msl/index.html" target="_blank" title="Curiosity is a curious thing">Curiosity Rover</a><br /></li>
									<li><a href="http://www.raspberrypi.org/" target="_blank" title="Raspberry 3.14">Raspberry Pi</a><br /></li>
								</ul>
								<hr />
								<a href="http://www.redeemer.ca" target="_blank" title="Redeemer University College"><img src="http://www.redeemer.ca/bin-new/images/footer.png" alt="Redeemer Logo" title="Redeemer University College" /></a>
							</div>
						</div>
					</div>
				<div id="foot">
					<div id="footcont">
						<div id="botcont">
						<div>
							<h1><a href="index.php" title="BrydonEastman.info">Home</a></h1>
						</div>
						<div>
							<h1><a href="articles.php?a=1">Articles</a></h1>
							<ul>
								<li><a href="articles.php?a=1" title="What Time is it?">Adventure Time Talk.</a></li>
								<li><a href="articles.php?a=2" title="The Metal.">Why I Love Metal.</a></li>
							</ul>
						</div>
						<div>
							<h1><a href="bio.php">About</a></h1>
						</div>
						<div>
							<h1><a href="mailto:beastman@redeemer.ca" title="Email Brydon">Contact</a></h1>
						</div>
						<div class="last">
							<h1>CSS Themes</h1>
							<ul>
								<li><a href="#" onclick="changeCSS(0)">Default CSS</a></li>
								<li><a href="#" onclick="changeCSS(1)">No CSS</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="footer"><span class="w3links"><a href="http://validator.w3.org/check/referer" target="_blank"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML" /></a>&nbsp;<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS" /></a></span><span title="beastman@redeemer.ca">Brydon Eastman</span></div>
			</div>
		</div>
	</body>
</html>
<?}?>
