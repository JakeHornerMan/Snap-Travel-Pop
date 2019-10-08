<?php
	require "header.php";
?>
	
	<main>
		<h1>Sign up</h1>
		<form action="includes/signup.inc.php" method="post">
			<input type="text" name="uid" placeholder="Username">
			<input type="text" name="mail" placeholder="E-mail">
			<input type="password" name="pwd" placeholder="Password">
			<input type="password" name="pwd-repeat" placeholder="Repeat Password">
			<button type="submit" name="signup-submit">Create Account</button>
		</form>
	</main>

<?php
	require "footer.php";
?>