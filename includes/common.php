<?php

session_start();

require 'config.php';

function redirect ($uri)
{
	header('location: '.$uri);
	exit;	
}

$databaseConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$logged = false;
$userName = '';
if (isset($_SESSION['logged'])) {
	$logged = true;
	$userName = $_SESSION['username'];
}
