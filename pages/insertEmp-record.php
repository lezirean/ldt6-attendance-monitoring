<?php
	include 'connection.php';

	//check connection
	if(!$connection)
	{
		die("Connection: " . mysqli_connect_error);
	}

	$sql = "INSERT INTO employee (employee_ID, " .  
								 "team_ID, " . 
								 "schedule_ID, " . 
								 "fname, " . 
								 "mname, " . 
								 "lname, " . 
								 "sex, " . 
								 "date_of_birth, " .
								 "address, " . 
								 "mobile_no, " . 
								 "email, " .
								 "password, " . 
								 "is_active) ". 
								 "VALUES ('". $_POST['employee_ID'] ."', ". 
									 	"'". $_POST['team_ID'] ."', ".
									 	"'". $_POST['schedule_ID'] ."', ".
									 	"'". $_POST['fname'] ."', ".
									 	"'". $_POST['mname'] ."', ".
									 	"'". $_POST['lname'] ."', ".
									 	"'". $_POST['sex'] ."', ".
									 	"'". $_POST['date_of_birth'] ."', ".
									 	"'". $_POST['address'] ."', ".
									 	"'". $_POST['mobile_no'] ."', ".
									 	"'". $_POST['email'] ."', ".
									 	"'". $_POST['password'] ."', ".
									 	"'". $_POST['is_active'] ."')";
	$connection->query($sql);
	echo $connection-> insert_id;


?>