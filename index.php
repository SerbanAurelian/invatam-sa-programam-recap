<?php

require 'includes/common.php';

if (!$logged) {
	redirect('login.php');
}

$error = isset($_GET['error']) ? $_GET['error'] : '';

include 'views/menu.html.php';
include 'views/home.html.php';