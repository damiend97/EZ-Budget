<?php
    // display errors
	ini_set('display_errors', 1); error_reporting(~0);
	// start session
	session_start();

	// declare empty string for password message
	$passMessage = "";

	// if form is submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		// require connection
		require_once('connection.php');

		// grab non-escaped passwords from form
		$p1 = $_POST["password"];
		$p2 = $_POST["re-password"];

		// if passwords don't match
		if ($p1 !== $p2) {
			// alert user passwords don't match
			$passMessage = "passwords don't match";
		}
		// if passwords match
		else {
			// check for existing users -----------
			$username = mysqli_real_escape_string($dbCon, $_POST['username']);
			$sql = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($dbCon, $sql);
			$check = mysqli_num_rows($result);

			// new user
			if ($check == 0) {
				// sign up the user -------------------
				// grab signin data from form
				// escape data
				$username = mysqli_real_escape_string($dbCon, $_POST['username']);
				$password = mysqli_real_escape_string($dbCon, $_POST['password']);
				$gender = mysqli_real_escape_string($dbCon, $_POST['gender']);

				// hash password
				$hash = password_hash($password, PASSWORD_DEFAULT);

				// prepare SQL statement
				$sql = "INSERT INTO users (username, password, gender) VALUE ('$username','$hash','$gender')";
				// execute query
				$result = mysqli_query($dbCon, $sql);

				// set session variable 'username'
				$_SESSION["username"] = $username;
				// redirect user to the dashboard
				header("location: dashboard.php");
			}
			// user already exists
			else {
				$passMessage = "user already exists";
			}
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>EZ Signup</title>
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
			margin-top: 75px;
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
			width: 100%;
			text-align: center;
			margin: 10px;
			padding: 5px;
			outline: 0;
			margin-left: auto;
			margin-right: auto;
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
		.rootWrapper input[type="radio"] {
			width: 100%;
			height: 2rem;
			border: 0;
			color: #2c2c2c;
		}
		.rootWrapper input[type="radio"]:checked {
			color: #2c2c2c;
			background: #2c2c2c;
			border: none;
		}
		.rootWrapper a {
			color: white;
			text-decoration: none;
		}
		#gender-select {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
			width: 100%;
			margin-left: auto;
			margin-right: auto;
			padding-top: 15px;
			padding-bottom: 15px;
		}
		#gender-select span {
			width: 100%;
			color: #888;
		}
		#gender-select .row {
			margin-top: 20px;
			margin-bottom: 20px;
			text-align: center;
			display: flex;
			justify-content: center;
			align-items: center;
			width: 75px;
			height: 75px;
			margin-left: 15px;
			margin-right: 15px;
		}
		#male-row {
			background: #2c2c2c;
			border: 1px solid #2c2c2c;
		}
		#female-row {
			background: white;
			border: 1px solid #2c2c2c;
		}
		#gender-select input {
			outline: 0;
			cursor: pointer;
		}
		@media only screen and (min-width: 450px) {
			.rootWrapper input {
				width: 400px;
			}
			#gender-select {
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
		<form action="signup.php" method="post" autocomplete="off">
			<div class="signup">SIGNUP</div>
			<?php echo $passMessage ?>
			<input type="text" name="username" placeholder="username" required />
			<input type="password" name="password" placeholder="password" required />
			<input type="password" name="re-password" placeholder="repeat password" required />
			<div id="gender-select">
				<br />
				<span><i>Select Your Theme</i></span>
				<div class="row" id="male-row">
					<input type="radio" name="gender" id="male" value="male" required/>
				</div>
				<div class="row" id="female-row">
					<input type="radio" name="gender" id="female" value="female" />
				</div>
			</div>
			<br />
			<input class="submit-button" type="submit" value="Signup">
			<br><i>Already have an account?</i><br><br>
			<a href="login.php" style="color: black;">Login</a><br><br>
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
					$('.rootWrapper').css("margin-top", "200px");
				}
			});
			$("input[type='text'], input[type='password']").focusout(function() {
				if($(window).width() < 500) {
					$('.rootWrapper').css("margin-top", "75px");
				}
			});
		});
	</script>
</body>
</html>