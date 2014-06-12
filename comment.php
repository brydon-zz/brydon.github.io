<?php session_start();

if (!isset($_SESSION['username']) || !isset($_GET['comment'])) { echo 1; }
else {
	$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
	$comment = $_GET['comment'];
	$aid = $_GET['a'];
	$aid = strip_tags($aid);
	$aid = $db->quote($aid);
	$comment = strip_tags($comment);
	$comment = $db->quote($comment);
	$time = date("d-m-y H:i");
	$user = $_SESSION['username'];
	$db->query("INSERT INTO comments (comment, time, aid, name) VALUES($comment, '$time', $aid, '$user')");
	echo "INSERT INTO comments (comment, time, aid, name) VALUES($comment, '$time', $aid, '$user')";
};

?>
