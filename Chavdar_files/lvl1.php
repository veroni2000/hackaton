<?php
session_start();
include("dbconfig.php");
$words=array('What number best completes the analogy: 8:4 as 10:', 'Which number should come next in the pattern: 37, 34, 31, 28', 'Which number should come next: 144, 121, 100, 81, 64', 'A boy is 5 years old and his sister is three times as old as he is. When the boy is 15 years old, how old will his sister be?', 'What is the number that is one half of one quarter of one tenth of 480?');
$numbers=array('5', '25', '49', '25', '6');
$r=rand(0,4);
$email=$_SESSION['email'];
 $br=$_SESSION['count'];

if (isset($_POST['submit'])) {

	$number=$numbers[$_SESSION['number']];
    $_SESSION['number']=$r;
	if ($_POST['text']==$number) {
		echo "<script>alert('You win');</script>";
		$br=$br+1;
		 $_SESSION['count']=$br;
	}
	else {
		
echo "<script>alert('Wrong answer');</script>";
	}
}
else{
	$_SESSION['number']=$r;
}
$query="UPDATE `level` SET `level2`='$br' WHERE `email` = '$email'";
  $result=mysqli_query($conn,$query);
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Games 2</title>
	<link rel="stylesheet" type="text/css" href="common.css"> 
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="register-form">
	<p class="title">IQ questions!</p>
	<p class="review1"><?php echo $words[$r]; ?></p>
	<fieldset class="input-group">
		<input type="text" name="text">
	</fieldset>
	<input type="submit" name="submit" value="Answer" class="full-btn-filled">
</form>
</body>
</html>


