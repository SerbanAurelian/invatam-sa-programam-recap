<h1>Users</h1>

<p>All Users</p>

<?php if (count($users) > 0): ?>
	<table border="1">
		<tr>
			<th>User ID</th>
			<th>Username</th>
			<th>Active</th>
		</tr>

		<?php foreach ($users as $user): ?>	
			<tr>
				<td><?=$user['id']?></td>
				<td><?=$user['username']?></td>
				<td><?=$user['register_code'] === null ? 'Yes' : 'No'?></td>
			</tr>
		<?php endforeach; ?>
	
</table> 
<?php endif; ?>