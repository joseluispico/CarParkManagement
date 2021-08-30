<?php
/*Database credentials*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'carPark_projectV2');

/*Attempt to connect to MySQL database*/
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check Connection
if($mysqli === false){
	
	die("ERROR: Could not connect. " . $mysqli_connect_error());
	
} 

?>