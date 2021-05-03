<?php

require 'includes/common.php';

session_start();

unset($_SESSION['logged']);

redirect('index.php');