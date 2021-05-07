<form method="POST"> 
	<input type="text" name="username" value="" placeholder="Username">
	<input type="password" name="password" value="" placeholder="Password">	
	<input type="submit" name="login" value="Login">
<a href="register.php">Register</a>
</form>

<?php if ($error !== ''): ?>
<p><?=$error?></p>
<?php endif; ?>