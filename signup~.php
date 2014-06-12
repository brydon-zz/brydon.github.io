<?php session_start();?><!--// The Bio page. //-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--// W3C Recommended the above doctype //-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/png" href="favicon.ico" />
		<title>Bio - Brydon Eastman Assignment CSC241</title>
		<meta name="description" content="A site with Comedy, Comics, and Videos."  />
		<meta name="keywords" content="Brydon, Eastman, BrydonEastman, Funny, Articles, Comics" />
		<link rel="stylesheet" href="styles/a1-styles.css" type="text/css" />
		<script type="application/javascript" src="java.js"></script>
	</head>
	<body id="bod" class="main">
		<div id="login"><?php $greetings = array('Sup ','Nice boots! ', 'Howdy ', 'Salutations ','Yippie Kai Yay ', 'Guzendheit '); if(isset($_SESSION['username'])) {?><?=$greetings[rand(0,sizeof($greetings)-1)].$_SESSION['username'].".<br /><a href='#' id='logout'>Logout</a>"?><?}else{?><a href="signup.php" title="Sign Up">Sign Up</a> / <a id="loginA" title="Login">Login</a><br /><div id="loginform">
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
					<div id="bio">
					<h1>'Bout Brydon</h1>
					<div>
						<img src="images/bnt.jpg" alt="Brydon Eastman" title="Brydon Eastman" class="top" />
						<p>&nbsp;&nbsp;I'm a university student at Redeemer University College in Ancaster, Ontario pursuing a 4 year Computer Science Major and an Honours Mathematics Major.</p>
						<p>&nbsp;&nbsp;I spent my summer working for Dr. Kevin Vander Meuelen under a USRA grant from the Natural Sciences and Engineering Research Council of Canada (NSERC).  We investigated Linear Algebra claims about <em>spectrally arbitrary matrices</em> and branched off into the previously untouched edges of the discipline.  We're in the process of editing a paper to be published.</p>
						<p>&nbsp;&nbsp;I'm fascinated by the internet and the possibility it holds. As a math buff and kid who grew up on electronics the sheer logic and complexity of computer systems (from networks to programs) both astounds and excites me.</p>
						<p>&nbsp;&nbsp;I invented the polish language, I was the first man in space, I single handedly overthrew the third reich, and am 42% electronic.</p>
						<div id="quote">
							<div class="top"></div>
								<div class="main">
									<p>Mathematics is the language with which God has written the universe.</p>
									<span>-Galileo Galilei&nbsp;</span>
								</div>
								<div class="bottom"></div>
								</div>
							</div>
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
