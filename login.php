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
	<title>EZ Login</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		.headerWrapper {
			background: #2c2c2c;
			text-align: left;
			padding-top: 5px;
			padding-bottom: 5px;
			padding-left: 25px;
			height: 75px;
			display: flex;
			align-items: center;
		}
		#headerLogo {
			height: 60px;
			width: 60px;
			background: url('./logo.png');
			background-size: contain;
			background-repeat: no-repeat;
			background-position: center;
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
		.signup {
			font-size: 2em;
			margin-top: 50px;
			margin-bottom: 30px;
			font-weight: bolder;
			background: #2c2c2c;
			color: white;
			border: none !important;
			padding: 15px;
			width: 370px;
			margin-left: auto;
			margin-right: auto;
		}
		.rootWrapper input {
			display: block;
			box-sizing: border-box;
			height: 50px;
			width: 400px;
			text-align: center;
			margin: 10px;
			padding: 5px;
			outline: 0;
		}
		.rootWrapper a {
			color: white;
			text-decoration: none;
		}
		.submit-button {
			background: #2c2c2c;
			color: white;
			border: none;
			font-size: 1.25em;
		}
		.submit-button:hover {
			background: #555;
			cursor: pointer;
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
		<a href="index.php">
			<div id="headerLogo"></div>
		</a>
	</div>
	<div class="rootWrapper">
		<form method="post" action="login.php" autocomplete="off">
			<div class="signup">LOGIN</div>
			<?php echo $loginMessage; ?>
			<input type="text" name="username" placeholder="username" required>
			<input type="password" name="password" placeholder="password" required>
			<input class="submit-button" type="submit" value="Login">
			<br><i>Don't have an account?</i><br><br>
			<a href="signup.php" style="color: black;">Signup</a>
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