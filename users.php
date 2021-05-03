<?php

require 'includes/common.php';

if (!$logged) {
	die('You are not logged');
}

$query = "SELECT id, username, register_code FROM users";

$databaseConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$result = mysqli_query($databaseConnection, $query);

$users = [];
while ($user = mysqli_fetch_assoc($result)) {
	$users[] = $user;
}

include 'views/menu.html.php';
include 'views/users.html.php';