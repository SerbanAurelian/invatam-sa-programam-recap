<?php

session_start ();

$username = '';
$email = '';
$error = '';
if (isset($_POST['register'])) {
	$username = trim($_POST['username']);
	if ($username === '') {
		$error = 'Invalid username!';
	} else {
		$email = trim($_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = 'Invalid email!';
		} else {
			$password = trim($_POST['password']);
			if ($password === '') {
				$error = 'Invalid password!';
			} else {	
				$password = md5($password);
				$code = md5(time().rand(100000, 999999));
				$link = 'http://localhost/invatam-sa-programam-recap/confirm.php?register_code='.$code;
				
				$query = "SELECT id FROM users WHERE username = '".$username."' OR email = '".$email."'";
	
				$databaseConnection = mysqli_connect('localhost', 'root', '', 'invatam_sa_programam_recap');
				$result = mysqli_query($databaseConnection, $query);
				$user = mysqli_fetch_assoc($result);
				if ($user !== null) {
					$error = 'User Already Exists!';
				} else {
					$query = 
						"INSERT INTO users (username, email, password, register_code)
						VALUES ('".$username."', '".$email."', '".$password."', '".$code."')";
					mysqli_query($databaseConnection, $query);
					
					mail('php@example.com', 'Invatam sa programam Registration Confirmation', 'Click on: '.$link.' to finalize registration!');
									
					header('location: index.php?message=Please check email and click on received link to confirm registration!'); // redirects to index php
					exit;
				}	
			}
		}	
	}
}

include 'menu.php';
?>
<form method="POST"> 
	<input type="text" name="username" value="<?=$username?>" placeholder="Username">
	<input type="text" name="email" value="<?=$email?>" placeholder="Email Address">
	<input type="password" name="password" value="" placeholder="Password">	
	<input type="submit" name="register" value="Register">
	<a href="index.php">Login</a>
</form>
<?php if ($error !== ''): ?>
	<p><?=$error?></p>
<?php endif; ?>