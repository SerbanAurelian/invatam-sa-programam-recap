<?php if (!$logged): ?>
	<form method="POST"> 
		<input type="text" name="username" value="" placeholder="Username">
		<input type="password" name="password" value="" placeholder="Password">	
		<input type="submit" name="login" value="Login">
		<a href="register.php">Register</a>
	</form>

	<?php if ($error !== ''): ?>
		<p><?=$error?></p>
	<?php endif; ?>
	
<?php endif; ?>

<?php if (isset($_GET['message'])): ?>
	<p><?=$_GET['message']?></p>
<?php endif; ?>

<h1>Invatam Sa Programam</h1>

<h3>PHP & MySQL</h3>

<p>HTML</p>