<?php 

	$dbhost = '127.0.0.1';
	$dbname = 'ldt6_db';
	$dbusername = 'root';
	$dbpassword = '';
	$dbport = '3308';
	//$dbsocket = "C:/xampp/mysql/mysql.sock"

	$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname, $dbport);
	//$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

	if(!$connection) {
		echo "Connection failed!";
	}

?>