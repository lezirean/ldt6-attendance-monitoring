<?php 
	session_start();
	require 'connection.php';

	if(isset($_POST['deleteBtn'])) {
		$team_ID = $_POST['delete-team-id'];

		$query = "DELETE FROM designation_team WHERE team_ID='$team_ID'";
		$result = mysqli_query($connection, $query);

		if($result) {
	        echo '<script> alert("Data Deleted"); </script>';
	        header('Location: teamsrecord.php');
	        exit();
	    } else {
	        echo '<script> alert("Data Not Deleted"); </script>';
	    }

	}
?>