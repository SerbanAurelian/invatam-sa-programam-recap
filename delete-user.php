<?php

require 'includes/common.php';

$userId = isset($_GET['user_id']) ? $_GET['user_id'] : 0;

$query = "DELETE FROM users WHERE id = ".(int)$userId;

mysqli_query($databaseConnection, $query);

redirect ('users.php');