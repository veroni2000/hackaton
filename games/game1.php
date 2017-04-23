<?php
	session_start();
	
	//Db Config Import
	include("../php/dbconfig.php");
	//Game mechanics
	include("../php/startup.php");
	//Check if there is active session available
	if(!isset($_SESSION['user'])){
		header("location: ../index.php");
	}else{
		$select_query = mysqli_query($conn, "SELECT * FROM `brain` WHERE `email`='" . $_SESSION['user'] . "'");
		$result_query = mysqli_fetch_assoc($select_query);
	}
	
	$words=array('What number best completes the analogy: 8:4 as 10:', 'Which number should come next in the pattern: 37, 34, 31, 28', 'Which number should come next: 144, 121, 100, 81, 64', 'A boy is 5 years old and his sister is three times as old as he is. When the boy is 15 years old, how old will his sister be?', 'What is the number that is one half of one quarter of one tenth of 480?');
	$numbers=array('5', '25', '49', '25', '6');
	$r=rand(0,4);

	if(isset($_POST['submit'])) {

		$number=$numbers[$_SESSION['number']];
		$_SESSION['number']=$r;
		
		if($_POST['text']==$number) {
			echo "<script>alert('You win');</script>";
			//Add 10 points
			$add_point_query = mysqli_query($conn, "UPDATE `level` SET `level2`= (`level2` + 10) WHERE `user_id` = (SELECT `user_id` FROM `brain` WHERE `email`='" . $_SESSION['user'] . "' LIMIT 1)");
		}else{
			echo "<script>alert('Wrong answer');</script>";
		}
	}else{
		$_SESSION['number']=$r;
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Games 2</title>
		<link rel="stylesheet" type="text/css" href="../styles/common.css"> 
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="games-form">
			<p class="title">IQ questions</p>
			<p class="review1"><?php echo $words[$r]; ?></p>
			<fieldset class="input-group">
				<input type="text" name="text">
			</fieldset>
			<input type="submit" name="submit" value="Answer" class="full-btn-filled">
		</form>
	</body>
</html>


