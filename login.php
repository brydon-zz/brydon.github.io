<?php session_start();
$badLogin = false;
if (isset($_GET['username']) and isset($_GET['password'])) {
	$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
	foreach ($db->query("SELECT * FROM users") as $user) {
		if (strtolower($user['name']) == strtolower($_GET['username']) and $user['password'] == $_GET['password']) {
			$badLogin = false;
			$_SESSION['username'] = $user['name'];
			$_SESSION['uid'] = $user['id'];
			echo $user['name'];
			if ($user['admin'] == 1) {?>
<br /><a href="publish.php" title="Create an Article!">Create</a><? 
				$a = explode("/",$_SERVER['HTTP_REFERER']); 
				$b = explode("?",$a[count($a)-1]); 
				if (count($b) == 2 and $b[0]=="articles.php") {?> <a href="publish.php?<?= $b[1];?>" title="Edit">Edit</a>
<?			}
			}
			break;
		}
		else $badLogin = true;
	}
}?>
