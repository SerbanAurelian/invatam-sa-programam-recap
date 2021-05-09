<?php

require 'includes/common.php';

$username = '';
$email = '';
$error = '';

if (isset($_POST['save'])) {
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
				
				$query = "SELECT id FROM users WHERE username = '".$username."' OR email = '".$email."'";
	
				$result = mysqli_query($databaseConnection, $query);
				$user = mysqli_fetch_assoc($result);
				if ($user !== null) {
					$error = 'User Already Exists!';
				} else {
					$query = 
						"INSERT INTO users (username, email, password, register_code)
						VALUES ('".$username."', '".$email."', '".$password."', NULL)";
					mysqli_query($databaseConnection, $query);
					
					redirect('users.php');
				}	
			}
		}	
	}
}

include 'views/menu.html.php';
include 'views/add-user.html.php';