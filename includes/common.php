<?php

session_start();

const SITE_URL = 'http://localhost/invatam-sa-programam-recap';
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'invatam_sa_programam_recap';

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
