<?php
  session_start();
  include 'connection.php';

  if(!$connection)
    die("Connection: ".mysqli_connect_error());


  if(isset($_POST['time'])) {
    date_default_timezone_set("Asia/Manila");

    if($_POST['attendanceFlag'] == true) {
      $schedID = $_SESSION['schedule_ID'];
      $empID = $_SESSION['employee_ID'];
      $timeIn = date("H:i:s");
      //$timeOut = NULL;
      $dateToday = $_POST['dateToday'];
      $hasSchedule = 1;
      $status_TimeOut = "";

      // determines status of attendance check in
      if($timeIn > '08:00:00') {
        $status_TimeIn = "Late";
      } else if($timeIn < '08:00:00') {
        $status_TimeIn = "Early";
      } else {
        $status_TimeIn = "On-time";
      }

      $sql = "INSERT INTO attendance (schedule_ID, employee_ID, time_in, date_today, has_schedule, status_timein, status_timeout)".
      "VALUES ('$schedID', '$empID', '$timeIn', '$dateToday', '$hasSchedule', '$status_TimeIn', '$status_TimeOut')";
      //$connection->query($sql);

      if ($connection->query($sql) === TRUE) {
        $query = "SELECT * FROM attendance WHERE employee_ID = '$empID' AND date_today = '$dateToday'";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['time_in'] = $row['time_in'];
        }

        header("Location: timeIn-out.php?error=Record inserted successfully."); //culprit kung bakit nagre-redirect sa insertAttendance.php        
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

    
    } else if(isset($_SESSION['timeOut'])){
      // show that the user has already checked out
      $_SESSION['attendanceMsg'] = "You have already checked out.";
      header("Location: timeIn-out.php?error=You have already checked out.");        
      exit();
    } else {
      $timeOut = date("H:i:s");
      $empID = $_SESSION['employee_ID'];
      $dateToday = $_POST['dateToday'];

      // determines status of attendance check out
      if($timeOut > '17:00:00') {
        $status_TimeOut = "Overtime";
      } else if($timeOut < '17:00:00') {
          $status_TimeOut = "Undertime";
      } else {
        $status_TimeOut = "On-time";
      }

      $sql = "UPDATE attendance
              SET time_out = '$timeOut', status_timeout = '$status_TimeOut'
              WHERE employee_ID = '$empID' AND date_today = '$dateToday'";

      if ($connection->query($sql) === TRUE) {
        $query = "SELECT * FROM attendance WHERE employee_ID = '$empID' AND date_today = '$dateToday'";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 1) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['timeOut'] = $row['time_out'];
        }

        header("Location: timeIn-out.php?error=You have checked out."); //culprit kung bakit nagre-redirect sa insertAttendance.php        
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      // $query = "SELECT * FROM attendance WHERE employee_ID = '$empID' AND date_today = '$dateToday'";
      // $result = mysqli_query($connection, $query);

      // if(mysqli_num_rows($result) == 1) {
      //   $row = mysqli_fetch_assoc($result);
      //   $_SESSION['timeOut'] = $row['time_out'];
      // }

    }

    }
?>
