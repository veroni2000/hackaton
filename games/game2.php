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
		<style>
			#arena p{
				display: block;
				width: 50px;
				height: 50px;
				border: 1px solid #ccc;
				text-align: center;
				line-height: 50px;
				font-size: 4rem;
				transition: .3s ease top, .3s ease left, .2s ease font-size;
			}
			
			#form{
				width: 500px;
				margin: auto;
			}
			
			#timer{
				width: 500px;
				height: auto;
				margin: 20px auto;
				text-align: center;
			}
			
			#timer span{
				display: inline-block;
				width: 100px;
				height: 120px;
				margin: 0 15px 0 15px;
				line-height: 120px;
				color: #fff;
				font-size: 4rem;
				border-radius: 15px;
				background-color: #333;
				background-image: linear-gradient(to bottom, #333, #000);
				vertical-align: top;
			}
			
			#timer i{
				display: inline-block;
				width: 10px;
				height: 120px;
				line-height: 120px;
				font-size: 4.5rem;
				font-style: normal;
				vertical-align: middle;
			}
			
			.gameStartUp{
				width: 500px;
				height: auto;
				padding: 3%;
				margin: 50px auto;
				box-shadow: 0 2px 5px 0 rgba(0,0,0, .3);
				box-sizing: border-box;
			}
		</style>
	</head>
	<body>
		<?php if(isset($_GET['game_started']) && $_GET['game_started']=="true"){ ?>
		<div id="timer">
			<span id="min"></span><i>:</i><span id="sec"></span>
		</div>
		<div id="arena" style="position: relative; width: 500px; height: 500px;margin: auto; border: 1px solid #333;overflow: hidden;">
			
		</div>
		<button onclick="startGame(2)">Start the game</button>
		<button onclick="endGame()">End the game</button>
		<form action="#" method="POST" id="form">
			<fieldset class="input-group">
				<input type="text" name="answer" placeholder="Answer">
			</fieldset>
			<input type="submit" value="Answer" class="full-btn-filled">
		</form>
		<script>
			var arena = document.getElementById("arena"), form = document.getElementById("form");
			
			var digits = [], colors = ["#33cc33", "#ff0000", "#6666ff", "#cc0099", "#ffff00", "#ff0066", "#cc33ff"], posX = [], posY = [], status = 0, answer = 0;
			
			function Digits(){
				for(var i = 1; i <= 100; i++){
					digits.push(i);
				}
				
				console.log(digits);
			}
			
			function startGame(lvl){
				status = 1;
				console.log(status);
				var selectedNums = [];
				//Digits 
				Digits();
				//Select the digits
				for(var i = 0; i < lvl; i++){
					selectedNums.push(rdm(100,1));
				}
				//Output the numbers
				console.log(selectedNums);
				//Output to the arena
				for(var i = 0; i < selectedNums.length; i++){
					var el = document.createElement("p"); 
					posY[i] = rdm(100,1);
					posX[i] = rdm(100,1);
					var att = el.setAttribute("style", "position: absolute; top:" + posY[i] + "%;left:" + posX[i] + "%; color: " + colors[rdm(colors.length,1)] + ";");
					el.innerHTML = selectedNums[i];
					arena.appendChild(el);
				}
				//Calculate the answer
				for(var i = 0; i < selectedNums.length; i++){
					answer += selectedNums[i];
				}
				console.log(answer);
			}
			
			function animateDigits(){
				if(status > 0){
					var childsLen = arena.children.length, childs = arena.children;
				
					for(var i = 0; i < childsLen; i++){
						posX[i] = rdm(95,1);
						posY[i] = rdm(95,1);
						//Set the position
						childs[i].style.top = posY[i] + "%";
						childs[i].style.left = posX[i] + "%";
						childs[i].style.fontSize = rdm(10,4) + "rem";
					}
					
					console.log("Fired!!!");
				}
			}
			
			function endGame(){
				status = 0;
				console.log(status);
				childs = arena.childNodes;
				
				console.log(arena.children.length);
				
				for(var i = 0; i >= arena.children.length; i++){
					arena.removeChild(childs[i]);
				}
			}
			
			function Submit(){
				if(status > 0){
					if(form[1].value == ""){
						alert("Cant leave this field empty");
					}else if(form[1].value == answer){
						alert("You win");
						form.reset();
					}else{
						alert("Wrong answer");
						form.reset();
					}
				}
			}
			
			function timer(){
				var minutes = document.getElementById("min"), seconds = document.getElementById("sec");
				//Calculate
				var min = Math.floor(time/60);
				var sec = Math.floor(time%60);
				if(sec < 0){
					min = "00";
					sec = "00"
					//End the Game
					endGame();
				}else{
					if(min < 10){
						minutes.innerHTML = "0" + min;
					}else{
						minutes.innerHTML = "0" + min;
					}
					
					if(sec < 10){
						seconds.innerHTML = "0" + sec;
					}else{
						seconds.innerHTML = sec;
					}
					/*
					minutes.innerHTML = Math.floor(time/60);
					seconds.innerHTML = Math.floor(time%60);
					*/
					time -= 1;
				}
			}
			
			//Random number function
			function rdm(max, min){
				return Math.floor(Math.random() * (max - min)) + min;
			}
			
			//Submit Form
			form.addEventListener("submit", function(event){ event.preventDefault(); Submit();});
		</script>
		<?php }else{ ?>
			<div class="gameStartUp">
				<a href="../php/game1.php?mode=start&amp;game=1" class="full-btn-unfilled-1">Start the Game</a>
			</div>
		<?php } ?>
	</body>
</html>