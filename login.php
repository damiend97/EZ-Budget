<?php
	// display errors
	ini_set('display_errors', 1); error_reporting(~0);
	// start session
	session_start();

	// declare empty string for login message
	$loginMessage = "";

	// if form is submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		// require connection
		require_once('connection.php');

		// grab login data from form
		// escape data
		$username = mysqli_real_escape_string($dbCon, $_POST['username']);
		$password = mysqli_real_escape_string($dbCon, $_POST['password']);

		// prepare SQL statement
		$sql = "SELECT password FROM users WHERE username='$username'";
		// execute query
		$result = mysqli_query($dbCon, $sql);
		// grab data from query results
		$dbPass = mysqli_fetch_array($result);

		// if passwords match
		if (password_verify($password, $dbPass[0])) {
			// set session variable 'username'
			$_SESSION["username"] = $username;
			// redirect user to the dashboard
			header("location: dashboard.php");
		}
		// if passwords don't match
		else {
			// alert user that passwords do not match
			$loginMessage = "login unsuccessful";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LOGIN</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		body {
			background: blue;
			color: white;
		}
		.headerWrapper {
			background: rgba(255,255,255,.4);
			text-align: center;
			padding: 15px;
		}
		#headerLogo {
			height: 45px;
			width: 45px;
		}
		.rootWrapper {
			height: 100vh;
			width: 100%;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: -1;
			display: flex;
			justify-content: space-around;
			align-items: center;
			flex-wrap: wrap;
			text-align: center;
		}
		.rootWrapper input {
			display: block;
			box-sizing: border-box;
			width: 250px;
			text-align: center;
			margin: 10px;
			padding: 5px;
			outline: 0;
		}
		.rootWrapper a {
			color: white;
			text-decoration: none;
		}
		@media only screen and (min-width: 450px) {
			.rootWrapper input {
				width: 400px;
			}
		}
	</style>
</head>
<body>
	<div class="headerWrapper">
		<a href="index.php"><img src="logo.png" alt="logo" id="headerLogo" /></a>
	</div>
	<div class="rootWrapper">
		<form method="post" action="login.php" autocomplete="off">
			<input type="text" name="username" placeholder="username" required>
			<input type="password" name="password" placeholder="password" required>
			<input type="submit" value="login">
			<?php echo $loginMessage; ?>
			<br /><br />
			<a href="signup.php">signup</a>
		</form>
	</div>
	<script
		src="https://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous">
	</script>
	<script>
		$(document).ready(function() {
			$("input[type='text'], input[type='password']").focus(function() {
				if($(window).width() < 500) {
					$('.rootWrapper').css("margin-top", "75px");
				}
			});
			$("input[type='text'], input[type='password']").focusout(function() {
				if($(window).width() < 500) {
					$('.rootWrapper').css("margin-top", "0px");
				}
			});
		});
	</script>
</body>
</html>