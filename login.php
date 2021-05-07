<?php

ini_set('display_errors', 1);

require 'includes/common.php';

if ($logged) {
	redirect('index.php');
}

$error = isset($_GET['error']) ? $_GET['error'] : '';

if (isset($_POST['login'])) {
	$query = "SELECT id, register_code FROM users WHERE username = '".$_POST['username']."' AND password = '".md5($_POST['password'])."'";

	$result = mysqli_query($databaseConnection, $query);
	$user = mysqli_fetch_assoc($result);
	if ($user !== null) {
		if ($user['register_code'] === null) {
			$_SESSION['logged'] = true;
			$_SESSION['username'] = $_POST['username'];
			
			redirect('index.php');
		} else {
			$error = 'Please confirm registration by clicking on the link you received at your email address!';
		}
	} else {
		$error = 'Invalid credentials!';
	}
}

include 'views/login.html.php';