<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!--CSS -->
   <!-- <link rel="stylesheet" href="timeIn-out.css"> --> 
     <link rel="stylesheet" href="../css/sidebar.css">
    

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>SIDE BAR</title>
  </head>

<style>
#date_today, #demo2  {
  font-family: "Work Sans", sans-serif;
  color: rgb(0, 0, 0);
  margin-top: 15px;
  text-align: center;
  display: flex;
  justify-content: center;
  font-size: 19pt;
}

.time {
  position: relative;
  margin-left: auto;
  margin-right: auto;
  margin-top: 35px;
  height: 15vw;
  width: 600px;
  background: rgb(72, 121, 110);
  color: rgb(255, 255, 255);
  border: 7px solid rgb(192, 192, 192);
  box-shadow: 0 2px 10px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
  padding: 10px;
  text-align: center;
}
.hms {
  font-size: 60pt;
  font-weight: 200;
}
.ampm {
  font-size: 22pt;
}
.date {
  font-size: 18pt;
}

.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
}

.button1 {
  background-color: #4CAF50;
  margin-top: 20%;
  font-size: 27px;
  color: white;
  width: 240px;
  height: 240px;
  border: none;
  border-radius: 300px;
  outline: none;
  cursor: pointer;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  cursor: pointer;
}
.button1:hover {
  background-color: #5e8f60;
  color: white;
}
</style>

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
                            <a href="timeIn-out.php">Attendance Form</a>
                        </li>
                    </ul>

                <li>
                    <a href="#MasterSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Master</a>
                    <ul class="collapse list-unstyled" id="MasterSubmenu">
                        <li>
                            <a href="teamsrecord.php">Teams</a>
                        </li>
                        <li>
                            <a href="employeerecord.php">Employees</a>
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
            <div id = "login" class = "box">

                <div class="time">
                    <span class="hms"></span>
                    <span class="ampm"></span>
                    <br>
                    <span class="date"></span>
                </div>
            
                   <!--<br>-->
                   <form method="post" name="form" action="insertAttendance.php"></form>
                    <p id = "date_today" name = "date_today"></p>
                    <h2 id = "time_in" name = "time_in" style="text-align: center;"></h2>
                    <h2 id = "time_out" name = "time_out" style="text-align: center;"></h2>
                    <p id="demo2" name = "demo2" ></p>    

                    <!-- Week Number (0 - 6) -->                     
                    <input type="hidden" id="has_schedule" name="has_schedule">         
            
                    <div class="center">                    
                    <!--<button class="button1" onclick="displayTime();">Time In</button>  -->    
                      <input type="submit" id="button1" class="button1" name = "time" onclick="displayTime();" value="Submit">                                  
                    </div>
                  </form>   
            
                <script src="../js/timeIn-out.js"></script>
            </div>

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
      $('#login').css('min-height', screen.height);
    </script>
</body>

</html>
