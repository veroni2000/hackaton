<?php
	session_start();
	//Db Config Import
	include("php/dbconfig.php");
	//Check if there is active session available
	if(isset($_SESSION['user'])){
		header("location: pages/home.php");
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>SuperScript || Register Page</title>
		<!-- CSS Import -->
		<link rel="stylesheet" type="text/css" href="styles/common.css">
		<link rel="stylesheet" type="text/css" href="styles/index.css">
		<!-- Viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<header class="main-banner">
			<div class="content">
				<a href="index.php" class="logo">
					<img src="https://goo.gl/eOIvq5" width="150" height="150" alt="">
				</a>
				<h1>Brain Shaker</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum, nisl ac pulvinar tempus, nulla nisi accumsan ligula, vitae condimentum metus risus sit amet dolor. Suspendisse egestas felis at quam imperdiet, id sagittis eros rhoncus. In vulputate sed libero eu finibus. Nulla maximus fringilla cursus.
				</p>
				<div class="btns-wrap">
					<a href="pages/register.php">Register</a>
					<a href="pages/login.php">Login</a>
				</div>
			</div>
			<div class="mask"></div>
		</header>
		<section class="games-wrap">
			<p class="heading">Improve your thinking by managing to complete these games</p>
			<div>
				<h2>Game title</h2>
				<div class="game-rew">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum, nisl ac pulvinar tempus, nulla nisi accumsan ligula, vitae condimentum metus risus sit amet dolor. Suspendisse egestas felis at quam imperdiet, id sagittis eros rhoncus. In vulputate sed libero eu finibus. Nulla maximus fringilla cursus.</p>
				</div>
			</div>
			<div>
				<h2>Game title</h2>
				<div class="game-rew">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum, nisl ac pulvinar tempus, nulla nisi accumsan ligula, vitae condimentum metus risus sit amet dolor. Suspendisse egestas felis at quam imperdiet, id sagittis eros rhoncus. In vulputate sed libero eu finibus. Nulla maximus fringilla cursus.</p>
				</div>
			</div>
			<div>
				<h2>Game title</h2>
				<div class="game-rew">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce interdum, nisl ac pulvinar tempus, nulla nisi accumsan ligula, vitae condimentum metus risus sit amet dolor. Suspendisse egestas felis at quam imperdiet, id sagittis eros rhoncus. In vulputate sed libero eu finibus. Nulla maximus fringilla cursus.</p>
				</div>
			</div>
		</section>
	</body>
</html>