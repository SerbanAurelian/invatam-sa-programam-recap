<?php

session_start ();

$error = '';
if (
	isset($_POST['login'])
) {
	$query = "SELECT id FROM users WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
	$databaseConnection = mysqli_connect('localhost', 'root', '', 'invatam_sa_programam_recap');
	$result = mysqli_query($databaseConnection, $query);
	$user = mysqli_fetch_assoc($result);
	if ($user !== null) {
		$_SESSION['logged'] = true;
		$_SESSION['username'] = $_POST['username'];
	} else {
		$error = 'Invalid credentials!';
	}
}

include 'menu.php';
?>
<?php if (!$logged): ?>

	<form method="POST"> 
		<input type="text" name="username" value="" placeholder="Username">
		<input type="password" name="password" value="" placeholder="Password">	
		<input type="submit" name="login" value="Login">
	</form>
	<?php if ($error !== ''): ?>
		<p><?=$error?></p>
	<?php endif; ?>
	
<?php endif; ?>

<h1>Invatam Sa Programam</h1>

<h3>PHP & MySQL</h3>

<p>HTML</p>