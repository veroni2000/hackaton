<?php 
	//Hostname
	define('Host', 'localhost');
	//Msql Username
	define('Name', 'root');
	//Msql Password
	define('Password', '');
	//Database Name
	define('Dbname', 'brain');
	
	$conn = mysqli_connect(Host, Name, Password, Dbname);
	
	if (!$conn){
		die ("Connection failed: " . mysqli_connect_error());
	}
	
?>