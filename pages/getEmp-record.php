<?php
	include 'connection.php';

	$sql = "SELECT * FROM employee";

	$result = mysqli_query($connection, $sql);

	$empRecord_array = array();
	while($row = mysqli_fetch_assoc($result))
	{
		$empRecord_array[] = $row;
	}

	header('Content-type: application/json');
	echo json_encode($empRecord_array);

	//closing the connection

	mysqli_close($connection);
?>