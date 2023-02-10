<!-- this is to insert values from client side to the database 
need to insert: time_in, time_out, date_today, status_timein, status_timeout -->

<?php
  session_start();
  include 'connection.php';

  //check connection
  if(!$connection)
    die("Connection: ".mysqli_connect_error());

  $empID = $_POST['emp-id'];
  $schedID = $_POST['schedule_ID'];

  



  //insert query 
  $sql = "INSERT INTO attendance (schedule_ID, employee_ID, time_in, time_out, date_today, has_schedule,
                                  is_approved_overtime, status_timein, status_timeout)".
          "VALUES ('".$_POST["schedule_ID"]."' , "." 
                   '".$_POST["employee_ID"] ."', "."
                   '".$_POST["time_in"]."' , "."
                   '".$_POST["time_out"] ."', "."
                   '".$_POST["date_today"] ."', "."
                   '".$_POST["has_schedule"] ."', "." 
                   '".$_POST["is_approved_overtime"] ."', "."
                   '".$_POST["status_timein"] ."', "."                      
                   '".$_POST["status_timeout"] ."')";

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


