<?php 
    session_start();
    require 'connection.php';

  if(!isset($_SESSION['employee_ID']) && !isset($_SESSION['password'])){  
    header("Location: index.php?err=No Present Session");
    exit(); 
  }
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 CSS CDN 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->
    <!--CSS -->
    <link rel="stylesheet" href="../css/employees.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    

    <title>Attendance Record</title>
  </head>

<body>
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id = "sidebar">
            <div class="sidebar-header">
               <img src="../images/logo.png" style="width:100%" alt="Avatar">
            </div>

            <hr></hr>
            <ul class="list-unstyled components">
                <!--<p>Dummy Heading</p>-->
                <li>
                    <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile</a>
                    <ul class="collapse list-unstyled" id="profileSubmenu">
                        <li>
                            <a href="../pages/adminProfile.php">My Profile</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#attendanceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attendance</a>
                    <ul class="collapse list-unstyled" id="attendanceSubmenu">
                        <li>
                            <a href="../pages/timeIn-out.php">Attendance Form</a>
                        </li>
                    </ul>
                </li>
        
         <li>
                    <a href="#masterSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Master</a>
                    <ul class="collapse list-unstyled" id="masterSubmenu">
                        <li>
                            <a href="../pages/teamsrecord.php">Teams</a>
                            <a href="../pages/employeerecord.php">Employees</a>
                            <a href="../pages/attendancerecord.php">Attendance Record</a>
                        </li>
                    </ul>
                </li>
                
                    <button type="button" class="btn btn-outline-dark logout" onClick="document.location.href='logout.php'">Logout</button>
               
        </nav>

        <!-- Page Content  -->
        <div id="content">


                    <!--Toggle button-->
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i> 
            </button>
        
            <div id = "body">
        <div class="container">
          <table id="employee-table" class="table table-responsive table-hover table-bordered table-striped">
          <br>
            <thead>
            <tr>
            <br>
              <th>attendance ID</th>
              <th>schedule ID</th>
              <th>employee ID</th>
              <th>time_in</th>
              <th>time_out</th>
              <th>date_today</th>
              <th>has_schedule</th>
              <th>status_timein</th>
              <th>status_timeout</th>
            </tr></thead>
            <tbody>
            </tbody>      
          </table>
          <button id = "btn-print-this" class = "btn btn-success btn-lg">Generate PDF</button>  
          <form>
             <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearAll();"></button>
            </div>
            <div class="modal-body">

            <form>
            
              <div class="mb-3">
              <label for="schedule_ID" class="col-form-label">schedule_ID</label>
              <input type="text" class="form-control" id="schedule_ID">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

               <div class="mb-3">
              <label for="employee_ID" class="col-form-label">employee_ID</label>
              <input type="text" class="form-control" id="employee_ID">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

               <div class="mb-3">
              <label for="time_in" class="col-form-label">time_in</label>
              <input type="text" class="form-control" id="time_in">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

              <div class="mb-3">
              <label for="time_out" class="col-form-label">time_out</label>
              <input type="text" class="form-control" id="time_out">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

              <div class="mb-3">
              <label for="date_today" class="col-form-label">date_today</label>
              <input type="text" class="form-control" id="date_today">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

               <div class="mb-3">
              <label for="has_schedule" class="col-form-label">has_schedule</label>
              <input type="text" class="form-control" id="has_schedule">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

               <div class="mb-3">
              <label for="status_timein" class="col-form-label">status_timein</label>
              <input type="text" class="form-control" id="status_timein">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

               <div class="mb-3">
              <label for="status_timeout" class="col-form-label">status_timeout</label>
              <input type="text" class="form-control" id="status_timeout">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

            </form>
            </div>
          <button id = "btn-print-this" class = "btn btn-success btn-lg">Generate PDF</button>  
        </div>
                          
    </div>
            

           

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src = "../js/printThis.js"></script>
        <script src="../js/attendancerecord.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
    
    <script type="text/javascript">
      $('#body2').css('max-height', screen.height);
      $('#body2').css('max-width', screen.width);
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#btn-print-this').click(function(){
            $('#body').printThis();
        });
      });
    </script>
</body>

</html>

