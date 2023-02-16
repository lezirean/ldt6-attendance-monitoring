<?php
	include 'connection.php';

	if(!$connection)
	{
		die("Connection: " . mysqli_connect_error);
	}

	$employee_ID = $_POST['employee_ID'];
	$team_ID = $_POST['team_ID'];
	$schedule_ID = $_POST['schedule_ID'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$sex = $_POST['sex'];
	$date_of_birth = $_POST['date_of_birth'];
	$address = $_POST['address'];
	$mobile_no = $_POST['mobile_no'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$is_active = $_POST['is_active'];


	$sql = "UPDATE employee SET employee_ID = '$employee_ID', team_ID = '$team_ID', schedule_ID = '$schedule_ID', fname = '$fname', mname = '$mname', lname = '$lname', sex = '$sex', date_of_birth = '$date_of_birth', address = '$address', mobile_no = '$mobile_no', email = '$email', password = '$password', is_active = '$is_active' WHERE employee_ID =$employee_ID";

	//$exec = mysqli_query($connection, $sql);
    //$row = mysqli_fetch_assoc($exec);
    //echo json_encode($row);

	if(mysqli_query($connection, $sql))
	{
		echo json_encode(array("statuscode"=>200));
	} 
	else
	{
		echo json_encode(array("statuscode"=>201));
	}

	mysqli_close($connection);
?>