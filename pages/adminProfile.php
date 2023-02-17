<?php 
  include 'connection.php';
  session_start();

  if(!isset($_SESSION['employee_ID']) && !isset($_SESSION['password'])){  
    header("Location: index.php?err=From Logout");
    exit(); 
  } else {
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!--CSS -->
    <link rel="stylesheet" href="../css/sidebar.css">
    

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>ADMIN PROFILE</title>
  </head>

<body>
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id = "sidebar">
            <div class="sidebar-header">
               <img src="../images/logo.png" alt = "LDT6" class = "header">
                <b><h3 style = "text-align: center;">TAGUIG</h3></b>
            </div>

            <hr>
            <ul class="list-unstyled components">
                <li>
                    <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile</a>
                    <ul class="collapse list-unstyled" id="profileSubmenu">
                        <li>
                            <a href="adminProfile.php">My Profile</a>
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

                <li>
                    <a href="#MasterSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Master</a>
                    <ul class="collapse list-unstyled" id="MasterSubmenu">
                        <li>
                            <a href="../pages/teamsrecord.php">Teams</a>
                        </li>
                        <li>
                            <a href="../pages/employeerecord.php">Employees</a>
                        </li>
                    </ul>
                </li>  
                    <button type="button" class="btn btn-outline-dark logout" onClick="document.location.href='logout.php'">Logout</button>
               
        </nav>

        <!-- Page Content  -->
        <div id="content">

                    <!--Toggle button-->
                    <button type="button" id="sidebarCollapse" class="btn btn-info" style = "margin-bottom: 50px;">
                        <i class="fas fa-align-left"></i> 
                    </button>

                    <!--Profile-->
                    <section id = "forProfile" class="box" style="background-color: salmon;">
                      <div class="container py-3 h-100">
                        <div class="row d-flex justify-content-center align-items-center">
                          <div class="col col-lg-6 mb-4 mb-lg-0 w-100 h-100">
                            <div class="card mb-3 box" style="border-radius: .5rem;">
                              <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-white"
                                  style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                    <?php 
                                        if($_SESSION['sex'] == 'Female') 
                                          echo "<img src='../images/admin.jpg' id='icon' alt='Avatar' class='img-fluid my-5' style='width: 80px;'>";
                                        else 
                                          echo "<img src='../images/businessman.png' id='icon' alt='Avatar' class='img-fluid my-5' style='width: 80px;'>";
                                      ?>
                                  <h5><?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?></h5>
                                  <p><?php echo $_SESSION['team_name'] ?></p>
                                </div>
                                <div class="col-md-8">
                                  <div class="card-body p-4">
                                  <h6><i class="fas fa-info-circle"></i> Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                      <div class="col-6 mb-3">
                                        <h6><i class="fas fa-list-ol"></i> Employee ID</h6>
                                        <p class="text-muted"><?php echo $_SESSION['employee_ID'] ?></p>
                                      </div>
                                      <div class="col-6 mb-3">
                                        <h6><i class="fas fa-envelope"></i> Email</h6>
                                        <p class="text-muted"><?php echo $_SESSION['email'] ?></p>
                                      </div>
                                      <div class="col-6 mb-3">
                                        <h6><i class="fas fa-phone"></i> Phone</h6>
                                        <p class="text-muted"><?php echo $_SESSION['mobile_no']?></p>
                                      </div>
                                      <div class="col-6 mb-3">
                                        <h6><i class="fas fa-user-alt"></i> Gender</h6>
                                        <p class="text-muted"><?php echo $_SESSION['sex'] ?></p>
                                      </div>
                                      <div class="col-6 mb-3">
                                        <h6><i class="fas fa-calendar"></i> Date of Birth</h6>
                                        <p class="text-muted"><?php echo $_SESSION['date_of_birth']?></p>
                                      </div>
                                      <div class="col-6 mb-3">
                                        <h6><i class="fas fa-map-marker-alt"></i> Address</h6>
                                        <p class="text-muted"><?php echo $_SESSION['address']?></p>
                                      </div>
                                    </div>
                                    
                                    </div>
                                    <div class="d-flex justify-content-start">
                                      <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                      <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                      <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                         </div>
                        </div>
                      </div>
                    </section> 
        </div>
                          

    <!--For The Sidebar-->
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
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

    <!--For The Box-->
    <script type="text/javascript">
      $('#forProfile').css('max-height', screen.height);
    </script>
</body>
</html>

<?php 
  }
?>
