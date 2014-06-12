<?php
	session_start();
	$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
	foreach ($db->query("SELECT * FROM users") as $user) {
		if (strtolower($user['name']) == strtolower($_GET['username'])) {
			echo "Username already in use.";
			break;
		}
	}
?>
