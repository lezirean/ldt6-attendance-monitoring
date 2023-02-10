<!-- this is to insert values from client side to the database 
need to insert: time_in, time_out, date_today, status_timein, status_timeout -->

<?php
  session_start();
  include 'connection.php';

  //check connection
  if(!$connection)
    die("Connection: ".mysqli_connect_error());

  
  if(isset($_POST['time'])) {
    
    $schedID = $_POST['schedule_ID'];
    $empID = $_POST['employee_ID'];

    $timeIn = $_POST['time_in'];
    $timeOut = $_POST['time_out'];
    $dateToday = $_POST['date_today'];

    $hasSchedule = $_POST['has_schedule'];

    $status_TimeIn = $_POST['status_timein'];
    $status_TimeOut = $_POST['status_timeout'];

    $query = "SELECT * FROM schedule WHERE schedule_ID = '$schedID'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
    
      switch ($hasSchedule) {
        case 0: 
          $schedQuery  = "SELECT * FROM schedule WHERE sun_time_in IS NOT NULL";
          $schedResult = mysqli_query($connection, $schedQuery);

          if(mysqli_num_rows($schedResult) == 0) {           
            noSched();
          }    
         break;

         case 1:
          $schedQuery  = "SELECT * FROM schedule WHERE mon_time_in IS NOT NULL";
          $schedResult = mysqli_query($connection, $schedQuery);

          if(mysqli_num_rows($schedResult) == 0) {           
            noSched();
          }    
         break;

         case 2:
          $schedQuery  = "SELECT * FROM schedule WHERE tues_time_in IS NOT NULL";
          $schedResult = mysqli_query($connection, $schedQuery);

          if(mysqli_num_rows($schedResult) == 0) {           
            noSched();
          }    
         break;

         case 3:
          $schedQuery  = "SELECT * FROM schedule WHERE wed_time_in IS NOT NULL";
          $schedResult = mysqli_query($connection, $schedQuery);

          if(mysqli_num_rows($schedResult) == 0) {           
            noSched();
          }    
         break;

         case 4:
          $schedQuery  = "SELECT * FROM schedule WHERE thurs_time_in IS NOT NULL";
          $schedResult = mysqli_query($connection, $schedQuery);

          if(mysqli_num_rows($schedResult) == 0) {           
            noSched();
          }    
         break;

         case 5:
          $schedQuery  = "SELECT * FROM schedule WHERE fri_time_in IS NOT NULL";
          $schedResult = mysqli_query($connection, $schedQuery);

          if(mysqli_num_rows($schedResult) == 0) {           
            noSched();
          }    
         break;

         case 6:
          $schedQuery  = "SELECT * FROM schedule WHERE sat_time_in IS NOT NULL";
          $schedResult = mysqli_query($connection, $schedQuery);

          if(mysqli_num_rows($schedResult) == 0) {           
            noSched();
          }    
         break;
      }
    }
    
    $new_time = DateTime::createFromFormat('h:i A', $timeIn);
    $timeIn_24 = $new_time->format('H:i:s');

    //STORE TIME IN STATUS 
     if($timeIn_24 > '08:00:00')
      $status_TimeIn = "Late";
  
     else if($timeIn_24 < '08:00:00')
      $status_TimeIn = "Early";

     else
      $status_TimeIn = "On Time";


    $new_time = DateTime::createFromFormat('h:i A', $timeOut);
    $timeOut_24 = $new_time->format('H:i:s');

    //STORE TIME OUT STATUS
    if($timeOut_24 != null || $timeIn != '') {

      if($timeOut_24 > '17:00:00' )
        $status_TimeOut = "Overtime";

      else if ($timeOut_24 < '17:00:00')
        $status_TimeOut = "Undertime";
      
      else
        $status_TimeOut = "On Time";
    }

   


  }

  //wala sched -- cant time in
  function noSched() {
    header("Location: insertAttendance.php?error=No schedule for today.");
    exit(); 
  }

  //insert query 
  $sql = "INSERT INTO attendance (schedule_ID, employee_ID, time_in, time_out, date_today, has_schedule,
                                  status_timein, status_timeout)".
    "VALUES ('$schedID', '$empID', '$timeIn', '$timeOut', '$dateToday', '$hasSchedule', '$status_TimeIn', '$status_Timeout')";

  //echo $sql;

  $connection->query($sql);
  echo $connection->insert_id;

?>
<!-- 
  success pag add using postman, kaso hardcoded including 'schedule_ID', 'employee_ID',
 ' has_schedule'. I need to get them from other tables then insert sa 'attendance' table.

 ' has_schedule' anu purpose. wala siya sa ibang table.

  Di ko gets how 'is_approved_overtime' works. 
-->


