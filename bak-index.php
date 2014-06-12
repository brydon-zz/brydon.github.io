<?php session_start();
$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
$admin = 0;
if (isset($_SESSION['username'])) {
	$uname = $db->quote($_SESSION['username']);
	foreach ($db->query("SELECT admin FROM users WHERE name = $uname") as $u) {
		$admin = $u['admin'];
	}
}?><!--// The "Home" page. //-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--// W3C Recommended the above doctype //-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/png" href="favicon.ico" />
		<title>Brydon Eastman Assignment CSC241</title>
		<meta name="description" content="A site with Comedy, Comics, and Videos."  />
		<meta name="keywords" content="Brydon, Eastman, BrydonEastman, Funny, Articles, Comics" />
		<link rel="stylesheet" href="styles/a1-styles.css" type="text/css" />
		<script type="application/javascript" src="java.js"></script>
	</head>
	<body id="bod" class="main">
					<div id="login"><?php $greetings = array('Sup ','Nice boots! ', 'Howdy ', 'Salutations ','Yippie Kai Yay ', 'Guzendheit '); if(isset($_SESSION['username'])) {?><?=$greetings[rand(0,sizeof($greetings)-1)].$_SESSION['username']?>
<br /><?if($admin==1){?><a href='publish.php' title='Create an Article'>Create</a><br /><?}?>
<a id='logout'>Logout</a><?}else{?><a href="signup.php" title="Sign Up">Sign Up</a> / <a id="loginA" title="Login">Login</a><br /><div id="loginform">
				Username: <input type="text" id="usernametext" name="username" /><br />
				Password: <input type="password" id="password" name="password" /><br />
				<input id="loginButt" type="button" value="Login" />
			</div><?}?></div>
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
						<div class="latest">
							<h1><a href="articles.php?a=1" title="Adventure Time!">What Time is it?</a></h1>
							<div><a href="articles.php?a=1" title="Adventure Time!"><img src="images/a-time.jpg" alt="Adventure Time!" title="Adventure Time!" /></a></div>
							<span>Date: <em>September 19, 2012</em></span>
						</div>
						<div id="feature">
							<h1>Welcome!</h1>
							<div><p>This site will feature links, videos, and pictures I find entertaining. Articles about things that intrigue me and more.  Expect to eventually find numerous CSS Themes to select in the bottom as time allows.</p></div>
						</div>
						<div id="latestvid">
							<h1>Latest Video</h1>
							<div id="vidlink"><a href="http://www.youtube.com/watch?v=9bZkp7q19f0" title="Latest Video" target="_blank"><img src="images/pix.png" alt="Latest Video" /></a></div>
							<span><em>Oppa Gangnam Style</em> is a music video by K-Pop sensation PSY.  Beware: This video is weirdly entertaining.</span>
						</div>
						<div class="latest">
							<h1><a href="articles.php?a=2" title="The Metal.">Why I Love Metal</a></h1>
							<div><a href="articles.php?a=2" title="The Metal."><img src="images/s-witch.jpg" alt="Skeletonwitch" title="This guys is enthusiastic." /></a></div>
							<span>Date: <em>September 19, 2012</em></span>
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
							<h1><a href="articles.php">Articles</a></h1>
							<ul>
								<?foreach($db->query("SELECT title,id FROM articles ORDER BY id DESC LIMIT 5") as $t) {?>
								<li><a href="articles.php?a=<?=$t['id']?>" title="<?=$t['title']?>"><?=$t['title']?></a></li>
								<?}?>
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
