<h1>Users</h1>

<p><a href="add-user.php">Add New User</a></p>

<?php if ($message !== ''): ?>
	<p><?=$message?></p>
<?php endif; ?>

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
				<td>
					<a href="edit-user.php?user_id=<?=$user['id']?>" >Edit</a>
					<a href="delete-user.php?user_id=<?=$user['id']?>"
						onclick="return confirm('Are you sure you want to delete the user?')">Delete
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	
	</table> 
<?php endif; ?>