<?php
	session_start();
	//Db Config Import
	include("../php/dbconfig.php");
	//Check if there is active session available
	if(!isset($_SESSION['user'])){
		header("location: ../index.php");
	}else{
		$select_query = mysqli_query($conn, "SELECT * FROM `brain` WHERE `email`='" . $_SESSION['user'] . "'");
		$result_query = mysqli_fetch_assoc($select_query);
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>SuperScript || Register Page</title>
		<!-- CSS Import -->
		<link rel="stylesheet" type="text/css" href="../styles/common.css">
		<!-- Viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<nav>
			<div class="nav-text">
				<span><?php echo $result_query['username']; ?></span>
				<span><?php echo "Lvl: 10"?></span>
			</div>
			<div class="nav-actions">
				<a href="../php/logout.php">Log off</a>
			</div>
		</nav>
		<ul class="gamelist">
			<li>
				<a href="../games/game1.php">
					<span>&#xe605;</span>
					<p>Game 1</p>
				</a>
			</li>
			<li>
				<a href="../games/game2.php">
					<span>&#xe605;</span>
					<p>Game 2</p>
				</a>
			</li>
			<li>
				<a href="../games/game3.php">
					<span>&#xe605;</span>
					<p>Game 3</p>
				</a>
			</li>
		</ul>
		<ul class="gamelist">
			<li>
				<a href="../games/game4.php">
					<span>&#xe605;</span>
					<p>Game 4</p>
				</a>
			</li>
		<ul>
	</body>
</html>