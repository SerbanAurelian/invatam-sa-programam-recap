<form method="POST"> 
	<input type="text" name="username" value="<?=$username?>" placeholder="Username">
	<input type="text" name="email" value="<?=$email?>" placeholder="Email Address">
	<input type="password" name="password" value="" placeholder="Password">	
	<input type="submit" name="register" value="Register">
	<a href="login.php">Login</a>
</form>
<?php if ($error !== ''): ?>
	<p><?=$error?></p>
<?php endif; ?>