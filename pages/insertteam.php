<?php 
	require "connection.php";

	if(isset($_POST['submit'])) {
		$team_ID = $_POST['team-id'];
		$team_name = $_POST['team-name'];

		$query = "INSERT INTO designation_team(team_ID, team_name) VALUES ('$team_ID', '$team_name')";
    	$result = mysqli_query($connection, $query);

    	if($result) {
	        echo '<script> alert("Data Saved"); </script>';
	        header('Location: teamsrecord.php');
	        exit();
	    } else {
	        echo '<script> alert("Data Not Saved"); </script>';
	    }

	}
?>