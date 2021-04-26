<?php

require 'includes/common.php';

if (!$logged) {
	die('You are not logged');
}

$query = "SELECT id, username, register_code FROM users";

$databaseConnection = mysqli_connect('localhost', 'root', '', 'invatam_sa_programam_recap');
$result = mysqli_query($databaseConnection, $query);

$users = [];
while ($user = mysqli_fetch_assoc($result)) {
	$users[] = $user;
}

include 'views/menu.html.php';
include 'views/users.html.php';