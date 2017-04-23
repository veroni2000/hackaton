<?php 
	if(!defined('Host') && !defined('Name') && !defined('Password')){
		include('dbconfig.php');
	}
	
	//Start Game params
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
		if(isset($_GET['game'])){
			$game = $_GET['game'];
		}
		
		switch($mode){
			case "start": 
				header("location: " . make_link($game) . "?game_started=true&mode=play");
				break;
			case "play":
				startGame();
				break;
		}
	}
	
	
	
	function make_link($game){
		switch($game){
			case 1:
				return "../games/game1.php";
				break;
			case 2:
				return "../games/game2.php";
				break;
			case 3:
				return "../games/game3.php";
				break;
			case 4:
				return "../games/game4.php";
				break;
			default:
				return false;
		}
	}
	
	function startGame(){
		echo "<script>
				window.onload = function(){
				//Game Start
				startGame(2);
				//Timer
				time = 10;
				timer();
				//Game Updater
				gameUpdate = window.setInterval(animateDigits, 300);
				//Timer Updater
				timeUpdate = window.setInterval(function(){ timer(180);}, 1000);}
			 </script>";
	}
?>