<?php
	session_start();
	include 'connection.php';
	
	if(!$connection)
	{
		die("Connection: " . mysqli_connect_error);
	}

	if()isset($_POST['action'] == "delete")
	{
		$id = $_POST['employee_ID'];

		$sql = mysqli_fetch_assoc(mysqli_query($connection, "DELETE FROM employee WHERE employee_ID = $id"));

		mysqli_query($connection, "DELETE FROM employee WHERE employee_ID = $id");
	}

	//$sql = "DELETE FROM employee WHERE employee_ID = '".$_POST["employee_ID"]."'"; 

	if(mysqli_query($connection, $sql))  
	 {  
	      echo 'Data Deleted';  
	 }

	 mysqli_close($connection);  
?>
