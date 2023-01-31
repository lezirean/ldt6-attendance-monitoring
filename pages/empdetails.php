<?php 
  session_start();

  if(!isset($_SESSION['employee_ID']) && !isset($_SESSION['password'])){  
    header("Location: index.php?err=From Logout");
    exit(); 
  } else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EMPLOYEE DETAILS</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <!-- External CSS -->
  <link rel="stylesheet" href="../css/sidebar-empdetails.css">

  <!-- Internal CSS -->
  <style type="text/css">
    .wrap-emp-deets {
      /*border: thick solid red;*/
      margin: 50px 0px 50px 30%;
      max-width: 60%;
      height: 400px;
    }

    .emp-deets {
      /*border: thick solid yellow;*/
      height: 85%;

    }

    tbody {
      height: 100%;
      padding: 0 3px;
    }

    tr {
      border-bottom: thin solid rgb(210, 210, 210);
    }

    th {
      width: 30%;
      padding-left: 5px;
      /*border: 3px solid violet;*/
    }

    td {
      /*border: 3px solid violet;*/
      color: #878787;
    }

    table {
      width: 100%;
      height: 100%;
      margin: 0;
      border-spacing: 0;
      /*border: thick solid green;*/
    }

    header {
      background: #0FAEEF;
      height: 10%;
      border-radius: 5px;
      padding-left: 2px;
      padding-top: 0;
      font-size: 30px;
      color: white;
    }

    img {
      width: 170px;
      height: 170px;
      top: 45%;
      position: absolute;
    }

    .divider {
      height: 5%;
      color: white;
    }

    * {
      box-sizing: border-box;
    }

    .outer {
/*      border: thin solid red;*/
      position: relative; /*tanggalin if ever*/
    }

    #name {
      text-align: left;
      padding-left: 25px;

    }

    .name-img {
/*      border: thin solid blue;*/
      display: inline;
      position: absolute;
      top: -5px;
      font-size: 2em;
    }

    .name-img > img {
      height: auto;
      width: auto;
      max-width: 180px;
      max-height: 170px;
      /*position: absolute;*/
      margin: 50px 50px 0 60px;
    }

  </style>

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id = "sidebar">
      <div class="sidebar-header">
        <img src="../images/logo.png" class="logo header">
          <h3 style="text-align: center;">TAGUIG</h3>
      </div>

      <hr>
      <ul class="list-unstyled components">
        <!--<p>Dummy Heading</p>-->
        <li>
            <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile</a>
            <ul class="collapse list-unstyled" id="profileSubmenu">
                <li>
                    <a href="empdetails.php">My Profile</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#attendanceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attendance</a>
            <ul class="collapse list-unstyled" id="attendanceSubmenu">
                <li>
                    <a href="#">Attendance Form</a>
                </li>
            </ul>
        </li>
              
        <button type="button" class="btn btn-outline-dark logout" onClick="document.location.href='logout.php'">Logout</button>    
        <!-- <a href="index.php" id="logout" class="btn btn-outline-dark logout">Logout</a> -->
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <!--Toggle button-->
      <button type="button" id="sidebarCollapse" class="btn btn-info">
          <i class="fas fa-align-left"></i> 
      </button>
      <div class="outer"> 
        <!-- <span id="emp-name">Name</span> -->
        <div class="name-img">
          <span id="name"><?php echo $_SESSION['fname'] ?></span> <br>
          <img src="../images/woman.png">
        </div>
        <div class="wrap-emp-deets">
            <header>Data</header>
            <div class="divider"></div>
            <div class="emp-deets">
              <table>
                <tbody>
                  <tr>
                    <th>Employee ID</th>
                    <td>: <?php echo $_SESSION['employee_ID'] ?></td>
                  </tr>
                  <tr>
                    <th>First name</th>
                    <td>: <?php echo $_SESSION['fname'] ?></td>
                  </tr>
                  <tr>
                    <th>Middle name</th>
                    <td>: <?php echo $_SESSION['mname'] ?></td>
                  </tr>
                  <tr>
                    <th>Last name</th>
                    <td>: <?php echo $_SESSION['lname'] ?></td>
                  </tr>
                  <tr>
                    <th>Team</th>
                    <td>: <?php echo $_SESSION['team_name'] ?></td>
                  </tr>
                </tbody>
              </table>
            </div>  
        </div>  
      </div>   
    </div>
  </div>                   

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
      $('#body').css('min-height', screen.height);
    </script>
</body>
</html>

<?php 
  }
?>