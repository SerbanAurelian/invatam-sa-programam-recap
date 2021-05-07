<?php

require 'includes/common.php';

if (!$logged) {
	die('You are not logged');
}

$query = "SELECT id, username, email, register_code FROM users";

$result = mysqli_query($databaseConnection, $query);

$users = [];
while ($user = mysqli_fetch_assoc($result)) {
	$users[] = $user;
}

include 'views/menu.html.php';
include 'views/users.html.php';