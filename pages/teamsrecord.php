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
    <link rel="stylesheet" href="teams.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    

    <title>Admin - Teams</title>
</head>

<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id = "sidebar">
       <div class="sidebar-header">
           <img src="../images/logo.png" alt = "LDT6" class = "header">
            <b><h3 style = "text-align: center;">TAGUIG</h3></b>
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
                        <a href="../pages/timeIn-out.html">Attendance Form</a>
                    </li>
                </ul>
            </li>
			
			 <li>
                <a href="#masterSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Master</a>
                <ul class="collapse list-unstyled" id="masterSubmenu">
                    <li>
                        <a href="../pages/teamsrecord.html">Teams</a>
						<a href="../pages/employeerecord.html">Employees</a>
                    </li>
                </ul>
            </li>
            
            <button type="button" class="btn btn-outline-dark logout" >Logout</button>    
    </nav>

    <!-- Page Content  -->
    <div id="content">


        <!--Toggle button-->
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i> 
        </button>

        <div id = "body" class = "box">
        	<div class="container">
        		<button id="btnAdd" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add New Team</button>
        		<table id="employee-table" class="table table-responsive table-hover table-bordered table-striped">
        		<br>
        			<thead>
        			<tr>
        			<br>
        				<th>Team Name</th>
        				<th>Team ID</th>
        				<th>Edit</th>
        				<th>Delete</th>
        			</tr></thead>
        			<tbody>
        				<tr>
        					<td>Installation</td>
        					<td>12345678</td>
        					<td><button class="btn btn-info" data-toggle="modal" onclick="editRow(this)">Edit</button></td>
        					<td><button class="btn btn-danger" data-bs-toggle="modal" onclick="deleteRow(this);">Delete</button></td>
        				</tr>			
        			</tbody>			
        		</table>	
        	</div>
    	
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            	  <div class="modal-dialog">
            		<div class="modal-content">
            		  <div class="modal-header">
            			<h5 class="modal-title" id="exampleModalLabel">Add New Team</h5>
            			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            		  </div>
            		  <div class="modal-body">
            			<form>
            			  <div class="mb-3">
            				<label for="team-name" class="col-form-label">Team Name:</label>
            				<input type="text" class="form-control" id="team-name">
            			  </div>
            			  <div class="mb-3">
            				<label for="team-id" class="col-form-label">Team ID:</label>
            				<input type="text" class="form-control" id="team-id">
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
    </div>
						

           

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
	
    <script src="../js/teams.js"></script>
		
    <script type="text/javascript">
      $('#body').css('min-height', screen.height);
    </script>
</body>

</html>
