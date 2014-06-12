<?php
session_start();
if (isset($_GET['a'])) {
	$db = new PDO("mysql:dbname=CSC241E;host=localhost", "csc241e", "sdwk2384");
	$aid = $db->quote($_GET['a']);
	$admin = 0;
	if (isset($_SESSION['username'])) {
		$uname = $db->quote($_SESSION['username']);
		foreach ($db->query("SELECT admin FROM users WHERE name = $uname") as $u) {
			$admin = $u['admin'];
		}
	}
	foreach ($db->query("SELECT * FROM comments WHERE aid = $aid") as $comments) {
		$c = true;
?>
		<div class="comment">
			<div class="commentTitle">
				<?= $comments["name"] ?>  <span><?=$comments['time']?></span>
			</div>
			<div class="commentBody">
				<?=$comments['comment']?>
			</div>
			<div class="commentFooter">
				<? if (isset($uname) and ($admin == 1 or $_SESSION['username']==$comments['name'])) {?><span class="delete" id="<?=$comments['id']?>">Delete this comment</span><?}?> <?= $comments['vote'] ?> <?if(isset($_SESSION['username'])){?> <a class="upVote" href="#<?=$comments['id']?>"><img src="upArrow.png" alt="Up Arrow" title="Upvote this comment." /></a><a class="downVote" href="#<?=$comments['id']?>"><img src="downArrow.png" alt="Down Arrow" title="Downvote this comment." /></a><?} ?>
			</div>
		</div>
<?	}
	if (!isset($c)) {?><p>There are no comments yet.</p><? }
}
?>
