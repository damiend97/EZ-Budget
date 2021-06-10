<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BUDGET APP 2.0</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		body {
			background: blue;
		}
		.headerWrapper {
			background: rgba(255,255,255,.4);
			text-align: center;
			padding: 15px;
		}
		#headerLogo {
			height: 30px;
			width: 30px;
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
		}
		.rootWrapper a {
			color: white;
			text-decoration: none;
			border: 1px solid white;
			border-radius: 5px;
			padding: 10px;
			width: 100px;
			cursor: pointer;
			text-align: center;
			transition: all 1s ease;
			outline: 0;
		}
		.rootWrapper a:hover {
			background: white;
			color: blue;
		}
		.rootWrapper a:active,
		.rootWrapper a:focus {
			outline: 0;
		}
		@media only screen and (min-width: 500px) {
			#headerLogo {
				height: 45px;
				width: 45px;
			}
			.rootWrapper a {
				width: 200px;
			}
		}
		@media only screen and (min-width: 700px) {
			.rootWrapper a {
				width: 300px;
			}
		}
	</style>
</head>
<body>
		<div class="headerWrapper">
			<img src="logo.png" alt="logo" id="headerLogo" />
		</div>
		<div class="rootWrapper">
			<a href="login.php">login</a>
			<a href="signup.php">signup</a>
		</div>
</body>
</html>