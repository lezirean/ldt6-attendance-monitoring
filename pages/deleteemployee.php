<?php
	include 'connection.php';
	if(!$connection)
	{
		die("Connection: " . mysqli_connect_error);
	}



 	//$sql = "DELETE FROM employee WHERE employee_ID = '".$_POST["employee_ID"]."'";
 	$sql = "DELETE FROM employee WHERE employee_ID = '".$_POST["employee_ID"]."'";

 	$result = mysqli_query($connection, $sql);

	header('Content-type: application/json');


 	echo json_encode([$_POST['employee_ID']]);

	 mysqli_close($connection);  
?>
