<?php
	if(isset($_POST['signup-submit'])){
		
		require 'dbh.inc.php';
		
		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];
		
		if (empty($username)||($email)||($password)||($passwordRepeat)){
			header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
			exit();
		}
		elseif (!filter_var($email, FILTER__VALIDATE_EMAIL)){
			header("Location: ../signup.php?error=invalidmail&uid=".$username);
			exit();
		}
		elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invaliduid&mail=".$email);
			exit();
		}
		elseif ($password !== $passwordRepeat){
			header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		}
		else{
			$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../signup.php?error=sqlerror");
				exit();
			}
		}
	}
?>