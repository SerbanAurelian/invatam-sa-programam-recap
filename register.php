<?php

require 'includes/common.php';

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
				$link = SITE_URL.'/confirm.php?register_code='.$code;
				
				$query = "SELECT id FROM users WHERE username = '".$username."' OR email = '".$email."'";
	
				$result = mysqli_query($databaseConnection, $query);
				$user = mysqli_fetch_assoc($result);
				if ($user !== null) {
					$error = 'User Already Exists!';
				} else {
					$query = 
						"INSERT INTO users (username, email, password, register_code)
						VALUES ('".$username."', '".$email."', '".$password."', '".$code."')";
					mysqli_query($databaseConnection, $query);
					
					mail($email, 'Invatam sa programam Registration Confirmation', 'Click on: '.$link.' to finalize registration!');
					
					redirect('index.php?message=Please check email and click on received link to confirm registration!');
				}	
			}
		}	
	}
}

include 'views/menu.html.php';
include 'views/register.html.php';