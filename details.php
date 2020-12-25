<?php

session_start ();

$logged = false;
if (isset($_SESSION['logged'])) {
	$logged = true;
}

include 'menu.php';

if (!$logged) {
	die('You are not logged');

}

?>

<h1>Details</h1>

<p>All my details</p>
