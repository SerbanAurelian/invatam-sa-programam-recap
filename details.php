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

$query = "SELECT id, username FROM users";

$databaseConnection = mysqli_connect('localhost', 'root', '', 'invatam_sa_programam_recap');
$result = mysqli_query($databaseConnection, $query);

$users = [];
while ($user = mysqli_fetch_assoc($result)) {
	$users[] = $user;
}

?>

<h1>Users</h1>

<p>All Users</p>

<?php if (count($users) > 0): ?>

 <table border="1">
	<tr>
		<th>User ID</th>
		<th>Username</th>
	</tr>

	<?php foreach ($users as $user): ?>	

	<tr>
		<td><?=$user['id']?></td>
		<td><?=$user['username']?></td>
	</tr>
	
	<?php endforeach; ?>
	
</table> 

<?php endif; ?>