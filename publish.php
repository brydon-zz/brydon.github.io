<?php session_start();
$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
$admin = 0;
$tit = "";
if (isset($_SESSION['username'])) {
	$uname = $db->quote($_SESSION['username']);
	foreach ($db->query("SELECT admin FROM users WHERE name = $uname") as $u) {
		$admin = $u['admin'];
	}
}
if (isset($_GET['a'])) {
	$a = $db->quote($_GET['a']);
	foreach($db->query("SELECT article,title FROM articles WHERE id=$a") as $result) {
		$article = $result['article'];
		$tit = $result['title'];
	}
}
?><!--// The Articles page. //-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--// W3C Recommended the above doctype //-->
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="icon" type="image/png" href="favicon.ico" />
		<title>Articles - Brydon Eastman Assignment CSC241</title>
		<meta name="description" content="A site with Comedy, Comics, and Videos."  />
		<meta name="keywords" content="Brydon, Eastman, BrydonEastman, Funny, Articles, Comics" />
		<link rel="stylesheet" href="styles/a1-styles.css" type="text/css" />
		<script type="application/javascript" src="java.js"></script>
		<script type="application/javascript" src="publish.js"></script>
	</head>
	<body id="bod" class="main">
		<div id="login"><?php $greetings = array('Sup ','Nice boots! ', 'Howdy ', 'Salutations ','Yippie Kai Yay ', 'Guzendheit '); if(isset($_SESSION['username'])) {?><?=$greetings[rand(0,sizeof($greetings)-1)].$_SESSION['username']?>
<br /><a id='logout'>Logout</a><?}else{?><a href="signup.php" title="Sign Up">Sign Up</a> / <a id="loginA" title="Login">Login</a><br /><div id="loginform">
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
						<div id="article">
							<h1 id="edit">Edit an Article</h1>
								<? if ($admin == 1) {?>
								<div id="editStuff">
									<iframe id="uploadTarget" name="uploadTarget"></iframe>
									<form id="editForm" method="post" action="edit.php">
										Title: <input name="title" type="text" value="<?=$tit?>" /><br />
										<textarea id="editText" name="text" cols="90" rows="50"><? if(isset($article)) {?><?= $article ?> <?} else {?>
											<div class="head"><img src="HEADER" alt="Header" /></div>
											<div class="date"><p><?=date("F");?></p><span> <?=date("d");?></span></div>
											<p>This is a sample.</p>
											<div class="img">
												<img alt="Image" src="image" />
												<span>Description of Image</span>
											</div>
											<div id="latestfoot">By: Brydon Eastman </div><?}?>
										</textarea>
										<input type="hidden" name="edit" value=<? if (isset($a)) {echo $a;} else { echo '0'; }?> />
									</form>
									<form id="upload" method="post" action="upload.php" enctype="multipart/form-data" target="uploadTarget">
										<div id="loading"><img src="loading.gif" alt="..." title="Loading" /></div>
										<formset id="uploadFormset">
											<input type="file" name="file" id="image" />
											<input type="submit" name="upload" id="uploadBtn" value="Upload" />
										</formset>
										<div id="uploadOut"></div>
									</form></div><div id="preview"></div><br />
									<hr />
									<input type="button" name="preview" id="previewEdit" value="Preview" /><input type="button" name="submit" id="submitEdit" value="Submit" />
								<? } else { ?>
								<p>You must be signed in as an administrator to perform these actions.</p>
								<?}?>
						</div><!--// End of article -->
					</div>
					<!--// End of leftmid -->
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
			</div> <!--// End of Mid //-->
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
