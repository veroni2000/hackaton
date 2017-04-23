<?php 
	session_start();
	//Logout php
	session_destroy();
	//Return to home page
	header("location: ../index.php");
?>