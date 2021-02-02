<?php
	session_start();

	// Define database
	define('dbhost', 'localhost');
	define('dbuser', 'root');
	define('dbpass', '');
	define('dbname', 'grocery');
	$con=mysql_connect($dbhost,$dbuser,$dppass);
	if(! $con)
	{
		die('Connection Failed' .mysql_error())
	}

	mysql_select_db($dbname,$con);
	

	// Connecting database
	//try {
		//$connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
		//$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//}
	//catch(PDOException $e) {
		//echo $e->getMessage();
	//}
?>

