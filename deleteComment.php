<?php
session_start();
$admin = 0;
$uFlag = 0;
if (isset($_SESSION['username']) and isset($_GET['id'])) {
	$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
	$uname = $db->quote($_SESSION['username']);
	$id = $db->quote($_GET['id']);
	foreach ($db->query("SELECT admin FROM users WHERE name = $uname") as $u) {
		$admin = $u['admin'];
	}
	foreach ($db->query("SELECT name FROM comments WHERE id = $id") as $u) {
		if ($u['name'] == $_SESSION['username']) $uFlag = 1;
	}
	if ($admin == 1 or $uFlag == 1) {
		$db->query("DELETE FROM comments WHERE id = $id");
	}
}

?>
