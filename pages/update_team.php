<?php 
	session_start();
	require 'connection.php';

	if(isset($_POST['editBtn'])) {
		$team_ID = $_POST['edit-team-id'];
		$team_name = $_POST['edit-team-name'];

		$query = "UPDATE designation_team SET team_ID='$team_ID', team_name='$team_name' WHERE team_ID='$team_ID'";
		$result = mysqli_query($connection, $query);

		if($result) {
	        echo '<script> alert("Data Saved"); </script>';
	        header('Location: teamsrecord.php');
	        exit();
	    } else {
	        echo '<script> alert("Data Not Updated"); </script>';
	    }

	}
?>
