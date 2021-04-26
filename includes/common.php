<?php

session_start();

$logged = false;
$userName = '';
if (isset($_SESSION['logged'])) {
	$logged = true;
	$userName = $_SESSION['username'];
}
