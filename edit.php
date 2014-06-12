<?php 
session_start();
$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
if(isset($_SESSION['username'])) {
	$admin = 0;
	if (isset($_SESSION['username'])) {
		$uname = $db->quote($_SESSION['username']);
		foreach ($db->query("SELECT admin FROM users WHERE name = $uname") as $u) {
			$admin = $u['admin'];
		}
	}
	if ($admin == 1) {
		if ($_POST['edit'] == 0) {
			$art = $db->quote($_POST['text']);
			$tit = $db->quote($_POST['title']);
			$db->query("INSERT INTO articles (article,title) VALUES($art,$tit)");
			foreach($db->query("SELECT id FROM articles WHERE article = $art") as $a) {
				$aid = $a['id'];
			}
			header('Location: articles.php?a='.$aid);
		}
		else {
			$good = false; // let's make sure people aren't messing around with the edit var.
			$id = $db->quote($_POST['edit']);
			foreach ($db->query("SELECT article FROM articles WHERE id = $id") as $a) {
				$good = true; // if this even runs once then we're in the clear.
			}
			if ($good) { // therefore this article is a real one, so let's update.
				$art = $db->quote($_POST['text']);
				$tit = $db->quote($_POST['title']);
				$db->query("UPDATE articles SET article = $art,title = $tit WHERE id = $id");
				header("Location: articles.php?a=".$_POST['edit']);
			}
		}
	}
}
?>
