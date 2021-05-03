<?php

require 'includes/common.php';

$error = isset($_GET['error']) ? $_GET['error'] : '';
if (isset($_POST['login'])) {
	$query = "SELECT id, register_code FROM users WHERE username = '".$_POST['username']."' AND password = '".md5($_POST['password'])."'";

	$result = mysqli_query($databaseConnection, $query);
	$user = mysqli_fetch_assoc($result);
	if ($user !== null) {
		if ($user['register_code'] === null) {
			$_SESSION['logged'] = true;
			$_SESSION['username'] = $_POST['username'];
			$logged = true;
			$userName = $_SESSION['username'];
		} else {
			$error = 'Please confirm registration by clicking on the link you received at your email address!';
		}
	} else {
		$error = 'Invalid credentials!';
	}
}

include 'views/menu.html.php';
include 'views/home.html.php';