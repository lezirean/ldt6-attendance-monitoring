<?php 
	session_start();
	require 'connection.php';

	if(isset($_POST['emp-id']) && isset($_POST['password'])) {
		$empID = $_POST['emp-id'];
		$password = $_POST['password'];

		if(empty($empID)) {
			header("Location: index.php?error=Employee ID is required");
			exit();
		} else if(empty($password)) {
			header("Location: index.php?error=Password is required");
			exit();
		} else {
			$query = "SELECT * FROM employee WHERE employee_ID = '$empID' AND password = '$password'";

			$result = mysqli_query($connection, $query);

			if(mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);

				if($row['employee_ID'] === $empID && $row['password'] === $password) {
					$_SESSION['employee_ID'] = $row['employee_ID'];
					$_SESSION['fname'] = $row['fname'];
					$_SESSION['mname'] = $row['mname'];
					$_SESSION['lname'] = $row['lname'];
					$_SESSION['sex'] = $row['sex'];
					$_SESSION['schedule_ID'] = $row['schedule_ID'];
					$team_ID = $row['team_ID'];

					$team_query = "SELECT team_name FROM designation_team WHERE team_ID = $team_ID";
					$team_result = mysqli_query($connection, $team_query);

					if(mysqli_num_rows($team_result) == 1) {
						$team_row = mysqli_fetch_assoc($team_result);
						$_SESSION['team_name'] = $team_row['team_name'];
					}

					if($_SESSION['employee_ID'] === "1234") {
						header("Location: adminProfile.php");
						exit();	
					} else {
						header("Location: empdetails.php");
						exit();	
					}		
				} else {
					header("Location: index.php?error=Invalid login combination.");
					exit();
				}
			} else {
				header("Location: index.php?error=Invalid login combination.");
				exit();				
			}
		}
	} else {
		header("Location: index.php");
		exit();
	}

?>
