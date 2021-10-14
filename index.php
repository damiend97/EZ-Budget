<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>EZ Budget</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"> 
	<style>
		* {
			margin: 0;
			padding: 0;
		}
		body {
			background: white;
			font-family: 'Ubuntu', sans-serif;
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
		.split-container {
			height: 100vh;
			width: 100%;
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: -1;
			display: flex;
		}
		.left-container {
			background: url('./save.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			width: 50%;
			height: 100vh;
		}
		.rootWrapper {
			height: 100vh;
			width: 50%;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-wrap: wrap;
		}
		.flex-center {
			height: 100%;
			position: absolute;
			top: 0;
			right: 0;
			width: 50%;
		}
		.flex-top {
			width: 100%;
			margin-top: 200px;
		}
		.flex-bottom {
			width: 100%;
			margin-top: 55px;
		}
		.text-container {
			width: 100%;
			text-align: center;
			color: #2c2c2c;
		}
		.button-container {
			width: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.mbot {
			margin-bottom: 5px;
		}
		.text-container h1 {
			font-weight: 100;
			font-size: 3.25em;
		}
		.text-container h2 {
			font-size: 1.25em;
			font-weight: 1000;
		}
		.button {
			color: white;
			text-decoration: none;
			border-radius: 5px;
			padding: 15px;
			width: 100px;
			cursor: pointer;
			text-align: center;
			transition: all 1s ease;
			outline: 0;
			margin-top: 10px;
			margin-bottom: 10px;
			background: #2c2c2c;
		}
		.button:hover {
			background: #545454;
		}
		.button:active,
		.button:focus {
			outline: 0;
		}
		@media only screen and (min-width: 500px) {
			/* #headerLogo {
				height: 45px;
				width: 45px;
			} */
			.button {
				width: 200px;
			}
		}
		@media only screen and (min-width: 700px) {
			.button {
				width: 300px !important;
			}
		}
		@media only screen and (max-width: 700px) {
			.left-container {
				display: none;
				width: 0%;
			}
			.rootWrapper {
				width: 100%;
			}
			.flex-center {
				width: 100%;
			}
			.button {
				width: 200px;
			}
		}
	</style>
</head>
<body>
		<div class="headerWrapper">
			<div id="headerLogo"></div>
		</div>
		<div class="split-container">
			<div class="left-container">

			</div>
			<div class="rootWrapper">
				<div class="flex-center">
					<div class="flex-top">
						<div class="text-container">
							<h1>EZ-Budget</h1>
						</div>
						<div class="text-container">
							<h2>The easy way to save.</h2>
						</div>
					</div>
					
					<div class="flex-bottom">
						<div class="button-container">
							<a class="button" href="login.php">Login</a>
						</div>
						<div class="button-container">
							<a class="button" href="signup.php">Signup</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
</body>
</html>