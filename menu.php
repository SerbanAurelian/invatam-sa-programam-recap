<?php
$logged = false;
$userName = '';
if (isset($_SESSION['logged'])) {
	$logged = true;
	$userName = $_SESSION['username'];
}
?>
<p>
	<a href="index.php">Home</a>
	
	<?php if ($logged): ?>
		<a href="users.php">Users</a>
		<a href="logout.php">Logout</a>
		<span>Salut, <?=$userName?></span>
	<?php endif; ?>
</p>