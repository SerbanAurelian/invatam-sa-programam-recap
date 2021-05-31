<?php

require 'includes/common.php';

$message = '';
$error = '';
$registerCode = $_GET['register_code'];

$query = "SELECT id FROM users WHERE register_code = '".$registerCode."'";

$result = mysqli_query($databaseConnection, $query);
$user = mysqli_fetch_assoc($result);
if ($user !== null) {
	$query = "UPDATE users SET register_code = NULL WHERE id = ".(int)$user['id'];
	$result = mysqli_query($databaseConnection, $query);
	$message = 'Success';
} else {
	$error = 'Invalid register code!';
}

redirect('login.php?message='.$message.'&error='.$error);