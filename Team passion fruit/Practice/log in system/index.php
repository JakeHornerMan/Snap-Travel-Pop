<?php
	require "header.php";
?>
	
	<main>
		<div>
			<form action="includes/login.inc.php" method="post">
				<input type="text" name="mailuid" placeholder="Username/Email...">
				<input type="password" name="pwd" placeholder="Password...">
				<button type="submit" name="login-submit">Login</button>
			</form>
			<a href="signup.php">Signup</a>
			<form action="includes/logout.inc.php" method="post">
				<button type="submit" name="logout-submit">Logout</button>
			</form>
		</div>
		<p>You are logged out</p>
		<p>You are logged in</p>
	</main>

<?php
	require "footer.php";
?>