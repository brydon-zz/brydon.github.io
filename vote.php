<?php
session_start();
if(isset($_SESSION['username']) and isset($_GET['id']) and isset($_GET['dir'])) {
	if ($_GET['dir'] != -1 and $_GET['dir'] != 1) $dir = 1;
	else $dir = $_GET['dir'];
	$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
	$id = $db->quote($_GET['id']);
	foreach ($db->query("SELECT vote,voters FROM comments WHERE id = $id") as $c) {
		$vote = $c['vote'];
		$voters = $c['voters'];
	};
	$canvote = false;
	if ($voters != NULL) {
		$a = explode(",",$voters);
		$up = array_search($_SESSION['username'].":1",$a);
		$down = array_search($_SESSION['username'].":-1",$a);
		if ($up!==false) { //if I've voted up
			if ($dir == -1) $canvote = true; // lemme vote down
			$a[$up] = $_SESSION['username'].":".$dir;
			$dir = -2; // -2 cause I have to "undo" my upvote
			$voters = implode(",",$a);
		} else if ($down!==false) { // if I've voted down
			if ($dir == 1) $canvote = true; // lemme vote up
			$dir = 2; // 2 cause I have to "undo" my downvote
			$a[$down] = $_SESSION['username'].":".$dir;
			$voters = implode(",",$a);
		} else { // if I haven't voted
			$canvote = true;
			$voters = $voters . ",".$_SESSION['username'].":".$dir; // add me to the list
		}
	} else { // if no ones voted
		$canvote = true;
		$voters = $_SESSION['username'].":".$dir;
	}
	if ($canvote) {
		$vote = $vote + $dir;
		$vote = $db->quote($vote);
		$voters = $db->quote($voters);
		$db->query("UPDATE comments SET vote = $vote, voters = $voters WHERE id = $id");
	}
	echo $vote;
}
?>
