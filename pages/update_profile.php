<?php 
	//I wanna php code to be here!!!!!!!!!!!!
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
		<form method="post" action="login.php" class="register-form">
			<fieldset class="input-group">
				<legend>Поднови електронната си поща: </legend>
				<label class="input-holder">
					<input type="email" name="email" placeholder="Електронна поща" value="<?php if(isset($email)){ echo $email; }?>">
				</label>
			</fieldset>
			<fieldset class="input-holder">
				<legend>Поднови паролата: </legend>
				<label class="input-holder">
					<input type="email" name="email" placeholder="Стара Парола" value="<?php if(isset($email)){ echo $email; }?>">
				</label>
				<label class="input-holder">
					<input type="password" name="pass" placeholder="Нова Парола" value="<?php if(isset($pass)){ echo $pass; } ?>">
				</label>
			</fieldset>
			<fieldset>
				<legend>Поднови профилната снимка: </legend>
				<input type="file" name="profileImg">
			</fieldset>
			<input type="submit" name="update" value="Login" class="full-btn-filled">
			<!-- Error Message Here -->
			<?php if(isset($errMsg)){ ?>
				<p class="err"><?php echo $errMsg ?></p>
			<?php } ?>
		</form>
	</body>
</html>