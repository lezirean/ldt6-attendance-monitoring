<?php 
    session_start();
    require 'connection.php';

  if(!isset($_SESSION['employee_ID']) && !isset($_SESSION['password'])){  
    header("Location: index.php?err=No Present Session");
    exit(); 
  } else {
    $query = "SELECT * FROM designation_team";
    $query2 = "SELECT * FROM schedule";

    $result = mysqli_query($connection, $query);
    $result2 = mysqli_query($connection, $query2);
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
    

    <title>Employee Record</title>
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
          <button id="btnAdd" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add New Employee</button>
          <table id="employee-table" class="table table-responsive table-hover table-bordered table-striped">
          <br>
            <thead>
            <tr>
            <br>
              <th>Employee ID</th>
              <th>Team ID</th>
              <th>Schedule ID</th>
              <th>First Name</th>
              <th>Middle Name</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>Password</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Address</th>
              <th>Date of Birth</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr></thead>
            <tbody>
                  
            </tbody>      
          </table>
          <button id = "btn-print-this" class = "btn btn-success btn-lg">Generate PDF</button>  
        </div>
        
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
              <label for="emp-num" class="col-form-label">Employee ID:</label>
              <input type="text" class="form-control" id="emp-num">
              <div class="invalid-feedback">
                        Please Input!
                      </div>
                  </div>

                  <div class="mb-3">
              <label for="team-name" class="col-form-label">Team ID:</label>
              <select class="form-select" id="team-name">
                <?php 
                                while($team = mysqli_fetch_assoc($result)) { 
                              ?>
                                    <option value="<?php echo $team['team_ID']; ?>"><?php echo $team['team_ID']; ?></option>
                                <?php } ?>  
              </select>
              </div>

              <div class="mb-3">
              <label for="emp-sched" class="col-form-label">Schedule ID:</label>
              <select class="form-select" id="emp-sched">
                <?php 
                                while($sched = mysqli_fetch_assoc($result2)) { 
                              ?>
                                    <option value="<?php echo $sched['schedule_ID']; ?>"><?php echo $sched['schedule_ID']; ?></option>
                                <?php } ?>  
              </select>
              </div>
              <div class="mb-3">
              <label for="first-name" class="col-form-label">First Name:</label>
              <input type="text" class="form-control" id="first-name">
              <div class="valid-feedback">
                        Looks good!.
                      </div>
              </div>

              <div class="mb-3">
              <label for="middle-name" class="col-form-label">Middle Name:</label>
              <input type="text" class="form-control" id="middle-name">
              <div class="valid-feedback">
                        Looks good!
                      </div>
              </div>

              <div class="mb-3">
              <label for="last-name" class="col-form-label">Last Name:</label>
              <input type="text" class="form-control" id="last-name">
              <div class="valid-feedback">
                        Looks good!
                      </div>
              </div>

              <div class="col-md-4">
                      <div class="mb-3">
                        <label for="emp-gender" class="form-label">Gender</label>
                        <select class="form-select" id ="emp-gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                    <div class="invalid-feedback">Select here!</div>
                    </div>
                  </div>

              <div class="mb-3">
              <label for="emp-password" class="col-form-label">Password:</label>
              <input type="text" class="form-control" id="emp-password">
              <div class="invalid-feedback">
                        Please provide a password.
                      </div>
              </div>

              <div class="mb-3">
              <label for="emp-email" class="col-form-label">Email:</label>
              <input type="text" class="form-control" id="emp-email">
              <div class="invalid-feedback">
                        Please provide email.
                      </div>
              </div>

               <div class="mb-3">
              <label for="phone-number" class="col-form-label">Phone Number:</label>
              <input type="text" class="form-control" id="phone-number">
               <div class="invalid-feedback">
                        Please provide phone number.
                      </div>
              </div>

              <div class="mb-4">
              <label for="emp-address" class="col-form-label">Address:</label>
              <input type="text" class="form-control" id="emp-address">
              <div class="invalid-feedback">
                        Please provide an address.
                      </div>
              </div>

              <div class="mb-4">
              <label for="emp-birth" class="col-form-label">Date of Birth:</label>
              <input type="date" class="form-control" id="emp-birth">
              <div class="invalid-feedback">
                        Please provide an address.
                      </div>
              </div>

              <div class="mb-3">
              <label for="emp-status" class="col-form-label">Status:</label>
              <select class="form-select" id="emp-status">
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
              </div>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" style="color:red" id="close" onclick="clearAll();" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="save" class="btn btn-primary" onclick="save();">Save</button>
            </div>
          </div>
          </div>
        </div>
                          
    </div>
            

           

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src = "../js/printThis.js"></script> 
     <script src="../js/employeerecord.js"></script>
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

<?php 
  }
?>
