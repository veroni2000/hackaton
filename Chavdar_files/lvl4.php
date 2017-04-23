<?php
session_start();
	include("dbconfig.php");
$words=array('power', 'hope', 'happy', 'balance', 'honestly', 'savage','faith','gossip','success','smile','confidence','knowledge','media');
$numbers=array('16-15-23-5-18', '8-15-16-5', '8-1-16-16-25', '2-1-12-1-14-3-5', '8-15-14-5-19-20-12-25', '19-1-22-1-7-5','6-1-9-20-8','7-15-19-19-9-16','19-21-3-3-5-19-19','19-13-9-12-5','3-15-14-6-9-4-5-14-3-5','11-14-15-23-12-5-4-7-5','13-5-4-9-1');
$r=rand(0,12);

  $email=$_SESSION['email'];
 $br=$_SESSION['count'];
if (isset($_POST['submit'])) {

	$word=$words[$_SESSION['word']];
    $_SESSION['word']=$r;
	if ($_POST['text']==$word) {
		echo "<script>alert('You win');</script>";
		$br=$br+1;
		 $_SESSION['count']=$br;
	}else{
		echo "<script>alert('Wrong answer');</script>";
	}
}
else{
	$_SESSION['word']=$r;
}
 $query="UPDATE `level` SET `level1`='$br' WHERE `email` = '$email'";
  $result=mysqli_query($conn,$query);
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Games 1</title>
	<link rel="stylesheet" type="text/css" href="common.css"> 
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="register-form">

	<p class="title">Convert the digits to words!</p>
	<p class="review"><?php echo $numbers[$r]; ?></p>
	<fieldset class="input-group">
		<input type="text" name="text">
	</fieldset>
	<input type="submit" name="submit" value="Answer" class="full-btn-filled">
</form>
</body>
</html>
