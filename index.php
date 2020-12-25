<?php

session_start ();

if (
	isset($_POST['login']) &&
	$_POST['username'] === 'admin' &&
	$_POST['password'] === 'parola'
) {
	$_SESSION['logged'] = true;
}

$logged = false;
if (isset($_SESSION['logged'])) {
	$logged = true;
}

include 'menu.php';

?>

<?php if (!$logged): ?>

<form method="POST"> 
	<input type="text" name="username" value="" placeholder="Username">
	<input type="password" name="password" value="" placeholder="Password">	
	<input type="submit" name="login" value="Login">
</form>

<?php endif; ?>
