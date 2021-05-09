<h1>Users</h1>

<p><a href="add-user.php">Add New User</a></p>

<?php if (count($users) > 0): ?>
	<table border="1">
		<tr>
			<th>User ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>Active</th>
			<th>Actions</th>
			
		</tr>

		<?php foreach ($users as $user): ?>	
			<tr>
				<td><?=$user['id']?></td>
				<td><?=$user['username']?></td>
				<td><?=$user['email']?></td>
				<td><?=$user['register_code'] === null ? 'Yes' : 'No'?></td>
				<td><a href="delete.php?user_id=<?=$user['id']?>" >Delete</a></td>
			</tr>
		<?php endforeach; ?>
	
	</table> 
<?php endif; ?>