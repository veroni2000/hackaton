<?php
	session_start();
	//Db Config Import
	include("../php/dbconfig.php");
	//Check if there is active session available
	if(isset($_SESSION['user'])){
		header("location: home.php");
	}
	
	if(isset($_POST['regon'])){
		//Error Msg Holder
		$errMsg = "";
		$err = 0;
		//Getting Inputs Values
		$username = $_POST['username'];
		$username = htmlspecialchars($username);
		$username = strip_tags($username);
		$username = mysql_real_escape_string($username);
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
		/* Gender */
		$gender = $_POST['gender'];
		
		if(empty($username) || empty($email) || empty($pass)){
			//Check if empty values module
			$err++;
			$errMsg = "Попълни всички полета";
		}elseif(!filter_var($email , FILTER_VALIDATE_EMAIL)){
			//Email Module
			$err++;
			$errMsg = "Попълни валидна електронна поща!";
		}
		
		if(!$err){
			//Database Check Module
			$select_query = mysqli_query($conn, "SELECT * FROM `brain` WHERE `email`='$email'");
		
			if(mysqli_num_rows($select_query) > 0){
				$err++;
				$errMsg = "Вече съществува такава Електронна поща!";
			}else{
				//Get the date of registration
				$now = date("Y-m-d");
				//Insert Query
				$insert_query = mysqli_query($conn, "INSERT INTO `brain`(`username`, `password`, `email`, `gender`, `reg_date`) VALUES ('$username', '$pass', '$email', '$gender', '$now')");
				//Making stats record
				$insert_stats_query = mysqli_query($conn, "INSERT INTO `level`(`user_id`, `level1`, `level2`, `level3`, `count`) VALUES ((SELECT `user_id` FROM `brain` WHERE `email`='$email' LIMIT 1), '0', '0', '0', '0')");
			}
		}
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
		<form action="#no-js" method="POST" id="form" class="register-form">
			<fieldset class="input-group">
				<label class="input-holder">
					<input type="text" name="username" placeholder="Име на играча" value="<?php if(isset($username)){ echo $username; } ?>">
				</label>
				<label class="input-holder">
					<input type="email" name="email" placeholder="Електронна поща" value="<?php if(isset($email)){ echo $email; }?>">
				</label>
				<label class="input-holder">
					<input type="password" name="pass" placeholder="Парола" value="<?php if(isset($pass)){ echo $pass; } ?>">
				</label>
			</fieldset>
			<fieldset class="input-group">
				<input type="radio" name="gender" value="male" id="male" checked>
				<label for="male" class="radio-lbl">
					<div class="check">
						<div class="check-bg"></div>
					</div>
					Male
				</label>
				<input type="radio" name="gender" value="female" id="female">
				<!-- Class Radio-lbl is class that define unique style to radio buttons Labels!!! -->
				<label for="female" class="radio-lbl">
					<div class="check">
						<div class="check-bg"></div>
					</div>
					Female
				</label>
			</fieldset>
			<input type="submit" name="regon" value="Register" class="full-btn-filled">
			<!-- Error Message Here -->
			<?php if(isset($errMsg) && !empty($errMsg)){ ?>
				<p class="err"><?php echo $errMsg ?></p>
			<?php } ?>
			<!-- Review -->
			<p class="review">You already have a profile <a href="login.php" class="link">Login here.</a></p>
		</form>
		<script>
			var form = document.getElementById("form");
			
			/*
			form.addEventListener("submit", function(event){ Submit();  event.preventDefault(); });
			*/
			
			function Submit(){
				var err = 0;
				
				for(var i = 0; i < form.length; i++){
			
					if(form[i].type == "text" || form[i].type == "email" || form[i].type == "password"){
						if(form[i].value == ""){
							err++;
						}
					}
				}
				
				if(err > 0){
					alert("Fill all the fields");
				}else{
					form.submit();
				}
			}
			
		</script>
	</body>
</html>