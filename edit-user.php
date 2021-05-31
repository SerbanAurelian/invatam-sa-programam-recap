<?php

require 'includes/common.php';

$username = '';
$email = '';
$error = '';

$userId = isset($_GET['user_id']) ? (int)$_GET['user_id'] : 0;
$query = "SELECT * FROM users WHERE id = ".$userId;
$result = mysqli_query($databaseConnection, $query);
$user = mysqli_fetch_assoc($result);
if ($user === null) {
	$error = 'User not found!';
} else {
	$username = $user['username'];
	$email = $user['email'];
	
	if (isset($_POST['save'])) {
		$newUsername = trim($_POST['username']);
		if ($newUsername === '') {
			$error = 'Invalid username!';
		} else {
			$newEmail = trim($_POST['email']);
			if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
				$error = 'Invalid email!';
			} else {
				$newPassword = trim($_POST['password']);
				$updatePassword = '';
				if ($newPassword !== '') {
					$newPassword = md5($newPassword);
					$updatePassword = ", password = ''".$newPassword."";
				}
				
				if (
					$username === $newUsername &&
					$email === $newEmail &&
					$newPassword === ''
				) {
					$error = 'No update!';
				} else {
					$query = 
						"SELECT id FROM users
						WHERE
						(username = '".$newUsername."' OR email = '".$newEmail."')
						AND id != ".(int)$user['id'];
	
					$result = mysqli_query($databaseConnection, $query);
					$otherUser = mysqli_fetch_assoc($result);
					if ($$otherUser !== null) {
						$error = 'User Already Exists!';
					} else {
						$query = 
							"UPDATE users SET
							username = '".$newUsername."'
							, email = '".$newEmail."'
							".$updatePassword."
							WHERE id = ".(int)$user['id'];
						mysqli_query($databaseConnection, $query);
					
						redirect('users.php?message=User '.$newUsername.' has been updated!');
				}
				}
			}
		}	
	}
}

include 'views/menu.html.php';
include 'views/edit-user.html.php';