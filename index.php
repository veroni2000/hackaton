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
		<title>BrainShaker || HomePage</title>
		<!-- CSS Import -->
		<link rel="stylesheet" type="text/css" href="styles/common.css">
		<link rel="stylesheet" type="text/css" href="styles/index.css">
		<link rel="stylesheet" href="../font/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
		<!-- Viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<header class="main-banner">
			<div class="content">
				<a href="index.php" class="logo">
					<img src="imgs/logo.png" width="150" height="150" alt="">
				</a>
				<h1>Brain Shaker</h1>
				<p>Test yourselves and your knowledge with a variety of educational games.
					
				<div class="btns-wrap">
					<a href="pages/register.php">Register</a>
					<a href="pages/login.php">Login</a>
				</div>
			</div>
			<div class="mask"></div>
		</header>
		<section class="games-wrap">
			<p class="heading">Improve your thinking by managing to complete these games.</p>
			<div>
				<h2>IQ questions</h2>
				<div class="game-rew">
					<p>Use your knowledge and solve the fallowing questions.</p>
				</div>
			</div>
			<div>
				<h2>Number addition</h2>
				<div class="game-rew">
					<p>Show your mathematical skills by writing the correct answer.</p>
				</div>
			</div>
			<div>
				<h2>Code</h2>
				<div class="game-rew">
					<p>Each letter equals its position in the alphabet. Guess the word by its code.</p>
				</div>
			</div>
		</section>
	</body>
</html>