<?php
	session_start();
	//Db Config Import
	include("../php/dbconfig.php");
	//Check if there is active session available
	if(isset($_SESSION['user'])){
		header("location: home.php");
	}
	
	if(isset($_POST['logon'])){
		//Error Msg Holder
		$errMsg = "";
		$err = 0;
		//Getting Inputs Values
		/* Password */
		$pass = $_POST['pass'];
		$pass = htmlspecialchars($pass);
		$pass = strip_tags($pass);
		$pass =  mysql_real_escape_string($pass);
		/* Email */
		$email = $_POST['email'];
		$email = htmlspecialchars($email);
		$email = strip_tags($email);
		$email = mysql_real_escape_string($email);
		
		if(empty($email) || empty($pass)){
			//Check if empty values module
			$err++;
			$errMsg = "Fill all the fields!";
		}elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
			//Email Module
			$err++;
			$errMsg = "Enter a valid email!";
		}
		
		if(!$err){
			//Database Check Module
			$select_query = mysqli_query($conn, "SELECT * FROM `brain` WHERE `email`='$email'");
			//Msql Result
			$select_result = mysqli_fetch_assoc($select_query);
		
			if($select_result['email']==$email && $select_result['password']==$pass){
				$_SESSION['user']=$select_result['email'];
				header("location: home.php");
			}else{
				$err++;
				$errMsg = "Incorrect login data!";
			}
		}
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>BrainShaker || LoginPage</title>
		<!-- CSS Import -->
		<link rel="stylesheet" type="text/css" href="../styles/common.css">
		<!-- Viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<form method="post" action="login.php" class="register-form">
			<fieldset class="input-group">
				<label class="input-holder">
					<input type="email" name="email" placeholder="Електронна поща" value="<?php if(isset($email)){ echo $email; }?>">
				</label>
				<label class="input-holder">
					<input type="password" name="pass" placeholder="Парола" value="<?php if(isset($pass)){ echo $pass; } ?>">
				</label>
			</fieldset>
			<input type="submit" name="logon" value="Login" class="full-btn-filled">
			<!-- Error Message Here -->
			<?php if(isset($errMsg)){ ?>
				<p class="err"><?php echo $errMsg ?></p>
			<?php } ?>
			<p class="review">Dont have a profile. Make a registration for free. <a href="register.php" class="link">Register here</a></p>
		</form>
	</body>
</html>