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
	<title>SIGNUP</title>
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
			margin-top: 75px;
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
		.rootWrapper input[type="radio"] {
			width: 100%;
			height: 2rem;
			border: 0px;
		}
		.rootWrapper a {
			color: white;
			text-decoration: none;
		}
		#gender-select {
		}
		#gender-select .row {
			background-position: left;
			background-size: contain;
			background-repeat: no-repeat;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		#male-row {
			background: url('male.png');
		}
		#female-row {
			background: url('female.png');
		}
		#gender-select input {
			outline: 0;
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
		<a href="index.php"><img src="logo.png" alt="logo" id="headerLogo" /></a>
	</div>
	<div class="rootWrapper">
		<form action="signup.php" method="post" autocomplete="off">
			<input type="text" name="username" placeholder="username" required />
			<input type="password" name="password" placeholder="password" required />
			<input type="password" name="re-password" placeholder="repeat password" required />
			<div id="gender-select">
				<br />
				<span>select gender</span>
				<div class="row" id="male-row">
					<input type="radio" name="gender" id="male" value="male" required/>
				</div>
				<div class="row" id="female-row">
					<input type="radio" name="gender" id="female" value="female" />
				</div>
			</div>
			<br />
			<input type="submit" value="signup">
			<br />
			<?php echo $passMessage ?>
			<br /><br />
			<a href="login.php">login</a>
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