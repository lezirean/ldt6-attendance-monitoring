<?php 
    session_start();
    require 'connection.php';

    if(!isset($_SESSION['employee_ID']) && !isset($_SESSION['password'])){  
      header("Location: index.php?err=From Logout");
      exit(); 
    } else {

        $query = "SELECT * FROM designation_team";
        $result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/teams.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <title>Admin - Teams</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
           <div class="sidebar-header">
               <img src="../images/logo.png" alt="LDT6" class="header">
                <b><h3 style="text-align: center;">TAGUIG</h3></b>
            </div>
            <hr></hr>
            <ul class="list-unstyled components">
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
            <div id="body" class="box">
            	<div class="container">
            		<button id="btnAdd" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add New Team</button>
            		<table id="employee-table" class="table table-responsive table-hover table-bordered table-striped">
            		<br>
            			<thead>
            			<tr>
            			<br>
                            <th>Team ID</th>
            				<th>Team Name</th>
            				<th>Edit</th>
            				<th>Delete</th>
            			</tr></thead>
            			<tbody>
                            <?php 
                                while($team = mysqli_fetch_assoc($result)) { 
                            ?>
                				<tr>
                                    <td><?php echo $team['team_ID']; ?></td>
                					<td><?php echo $team['team_name']; ?></td>
                					<td><button class="btn btn-info editBtn" data-toggle="modal">Edit</button></td>
                					<td><button class="btn btn-danger deleteBtn" data-bs-toggle="modal">Delete</button></td>
                				</tr>	
                            <?php } ?>		
            			</tbody>			
            		</table>	
            	</div>
        	   
               <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                	  <div class="modal-dialog">
                		<div class="modal-content">
                		  <div class="modal-header">
                			 <h5 class="modal-title" id="exampleModalLabel">Add New Team</h5>
                			 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                		  </div>
                          <form method="POST" action="insertteam.php">
                    		  <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="team-id" class="col-form-label">Team ID:</label>
                                    <input type="number" class="form-control" id="team-id" name="team-id">
                                  </div>
                                  <div class="mb-3">
                    				<label for="team-name" class="col-form-label">Team Name:</label>
                    				<input type="text" class="form-control" id="team-name" name="team-name">
                    			  </div>
                		      </div>
                          
                    		  <div class="modal-footer">
                    			<button type="button" style="color:red" id="close" onclick="clearAll();" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    			<button type="submit" name="submit" id="save" class="btn btn-primary">Save</button>
                    		  </div>
                          </form>
                		</div>
                	  </div>
                </div> 

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Edit Team Details</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="update_team.php">
                              <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="edit-team-id" class="col-form-label">Team ID:</label>
                                    <input type="number" class="form-control" id="edit-team-id" name="edit-team-id" readonly>
                                  </div>
                                  <div class="mb-3">
                                    <label for="edit-team-name" class="col-form-label">Team Name:</label>
                                    <input type="text" class="form-control" id="edit-team-name" name="edit-team-name">
                                  </div>
                              </div>
                          
                              <div class="modal-footer">
                                <button type="button" style="color:red" id="close" onclick="clearAll();" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="editBtn" id="editBtn" class="btn btn-primary">Save</button>
                              </div>
                          </form>
                        </div>
                      </div>
                </div> 

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLabel">Delete this team?</h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="deleteteam.php">
                              <div class="modal-body">
                                  <div class="mb-3">
                                    <label for="delete-team-id" class="col-form-label">Team ID:</label>
                                    <input type="number" class="form-control" id="delete-team-id" name="delete-team-id" readonly>
                                  </div>
                                  <div class="mb-3">
                                    <label for="delete-team-name" class="col-form-label">Team Name:</label>
                                    <input type="text" class="form-control" id="delete-team-name" name="delete-team-name" readonly>
                                  </div>
                              </div>
                          
                              <div class="modal-footer">
                                <button type="button" style="color:red" id="close" onclick="clearAll();" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="deleteBtn" id="deleteBtn" class="btn btn-primary">Delete</button>
                              </div>
                          </form>
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
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="../js/teams.js"></script>

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

    <script>
        $(document).ready(function () {

            $('.editBtn').on('click', function () {

                $('#editModal').modal('show');

                var tr = $(this).closest('tr');

                var data = tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#edit-team-id').val(data[0]);
                $('#edit-team-name').val(data[1]);
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.deleteBtn').on('click', function () {

                $('#deleteModal').modal('show');

                var tr = $(this).closest('tr');

                var data = tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete-team-id').val(data[0]);
                $('#delete-team-name').val(data[1]);
            });
        });
    </script>

</body>
</html>

<?php 
  }
?>
