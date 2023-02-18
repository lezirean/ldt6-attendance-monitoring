var _row = null;

function addRow()
{
  var empNum = $('#emp-num').val();
  var teamName = $('#team-name option:selected').text();
  var empSched = $('#emp-sched option:selected').text();
  var firstName = $('#first-name').val();
  var middleName = $('#middle-name').val();
  var lastName = $('#last-name').val();
  var empGender = $('#emp-gender option:selected').text();
  var empPassword = $('#emp-password').val();
  var empEmail = $('#emp-email').val(); 
  var phoneNumber = $('#phone-number').val();
  var empAddress = $('#emp-address').val();
  var empBirth = $('#emp-birth').val();  
  var empStatus = $('#emp-status option:selected').text();
  
  console.log(empNum);
  console.log(teamName);
  console.log(empSched);
  console.log(firstName);
  console.log(middleName);
  console.log(lastName);
  console.log(empGender);
  console.log(empPassword);
  console.log(empEmail);
  console.log(phoneNumber);
  console.log(empAddress);
  console.log(empBirth);
  console.log(empStatus);
  
  
  insertEmprecord(empNum, teamName, empSched, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, empStatus);
  
  $('#addModal').modal('hide');
  clearAll();
}

function EditaddRow()
{
  var empNum = $('#emp-num').val();
  var teamName = $('#team-name option:selected').text();
  var empSched = $('#emp-sched option:selected').text();
  var firstName = $('#first-name').val();
  var middleName = $('#middle-name').val();
  var lastName = $('#last-name').val();
  var empGender = $('#emp-gender option:selected').text();
  var empPassword = $('#emp-password').val();
  var empEmail = $('#emp-email').val(); 
  var phoneNumber = $('#phone-number').val();
  var empAddress = $('#emp-address').val();
  var empBirth = $('#emp-birth').val();  
  var empStatus = $('#emp-status option:selected').text();
  
  console.log(empNum);
  console.log(teamName);
  console.log(empSched);
  console.log(firstName);
  console.log(middleName);
  console.log(lastName);
  console.log(empGender);
  console.log(empPassword);
  console.log(empEmail);
  console.log(phoneNumber);
  console.log(empAddress);
  console.log(empBirth);
  console.log(empStatus);
  
  
  update_row(empNum, teamName, empSched, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, empStatus);
  
  $('#addModal').modal('hide');
  clearAll();
}


function deleteRow(row)
{
  var result = confirm('Are you sure you want to delete this data?');
  if (result == true)   
    $(row).parents('tr').remove();
  else
    event.preventDefault();
}

function editRow(row)
{
  _row = $(row).parents("tr");
  var col = _row.children("td");


  $("#save").text("Save Edit");
  $("#close").text("Cancel");
  $("#emp-num").val($(col[0]).text());
  $("#team-name").val($(col[1]).text());  
  $("#emp-sched").val($(col[2]).text()); 
  $("#first-name").val($(col[3]).text());
  $("#middle-name").val($(col[4]).text());
  $("#last-name").val($(col[5]).text());
  $("#emp-gender").val($(col[6]).text()); 
  $("#emp-password").val($(col[7]).text());
  $("#emp-email").val($(col[8]).text());
  $("#phone-number").val($(col[9]).text());
  $("#emp-address").val($(col[10]).text());
  $("#emp-birth").val($(col[11]).text());
  $("#emp-status").val($(col[12]).text());
  $("#exampleModalLabel").text("Edit Record");
  $("#addModal").modal("toggle");

  console.log($("#team-name").val($(col[1]).text()));
  
}

function save()
{
  if($("#save").text() == "Save Edit")
  {
    editRow2();
  }
  else if($("#save").text() == "Save")
  {
    $('#employee-table tbody').append(addRow());
    $('#addModal').modal('hide');         
    clearAll(); 
  }
}
function editRow2()
{

    $(_row).after(EditaddRow());
      // Remove original product
    //delete_row(_row)
    $('#addModal').modal('hide');         
    clearAll();
  
}

function clearAll()
{
  $('#emp-num').val('');
  $('#team-name').prop("selectedIndex",0);
  $('#emp-sched').prop("selectedIndex",0);
  $('#first-name').val('');
  $('#middle-name').val('');
  $('#last-name').val('');
  $("#emp-gender").prop("selectedIndex",0);
  $("#emp-username").val('');
  $("#emp-password").val('');
  $('#emp-email').val('');  
  $("#phone-number").val('');
  $("#emp-address").val('');
  //$("#emp-birth").val($('');
  $("input[type=date]").val("")
  $('#emp-status').prop("selectedIndex",0);
  $("#save").text("Save");
  $("#close").text("Close");
  $("#exampleModalLabel").text("Add Record");
  
}

function addNewRowHTML(empNum, teamName, empSched, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, empStatus)
{
  var newRow = '<tr>' +
          '<td>' + empNum + '</td>' +
          '<td>' + teamName + '</td>' +
          '<td>' + empSched + '</td>' +
          '<td>' + firstName + '</td>' +
          '<td>' + middleName + '</td>' +
          '<td>' + lastName + '</td>' +
          '<td>' + empGender + '</td>' +
          '<td>' + empPassword + '</td>' +
          '<td>' + empEmail + '</td>' +
          '<td>' + phoneNumber + '</td>' +
          '<td>' + empAddress + '</td>' +
          '<td>' + empBirth + '</td>' +
          '<td>' + empStatus + '</td>' +
          '<td><button class="btn btn-info" onClick="editRow(this);">Edit</button></td>' +
          '<td><button class="btn btn-danger" onClick = "delete_row('+empNum+');">Delete</button></td>' +
        '</tr>';
  
  var tableBody = $('#employee-table tbody');
  tableBody.append(newRow);
}

function getEmprecord()
{
  $.ajax ({
    url: 'getEmp-record.php',
    method: "GET",
    data: {},
    dataType: "json",
    success: function(response) {
      $('#employee-table tbody').empty();

      $.each(response, function(key, value){
        addNewRowHTML(value.employee_ID,
                value.team_ID, 
                value.schedule_ID, 
                value.fname,
                value.mname, 
                value.lname,
                value.sex,
                value.password,
                value.email,
                value.mobile_no,
                value.address,
                value.date_of_birth,         
                value.is_active);
      });
    }
  });
}

function insertEmprecord(employee_ID, team_ID, schedule_ID, fname, mname, lname, sex, password, email, mobile_no, address, date_of_birth, is_active)
{
  $.ajax 
  ({
    url: 'insertEmp-record.php',
    method: "POST",
    data: {
      "employee_ID" : employee_ID,
      "team_ID" : team_ID,
      "schedule_ID" : schedule_ID,
      "fname" : fname,
      "mname" : mname,
      "lname" : lname,
      "sex" : sex,
      "date_of_birth" : date_of_birth,
      "address" : address,
      "mobile_no" : mobile_no,
      "email" : email,
      "password" : password,
      "is_active" : is_active
    },
    dataType: "json",
    success: function(id) {
      if(id != 0)
      {
        addNewRowHTML(employee_ID, team_ID, schedule_ID, fname, mname, lname, sex, password, email, mobile_no, address, date_of_birth, is_active);
      }
      else
      {
        alert("Insert Failed: something went wrong.");
      }
    }
  });
}

function delete_row(row)
{
  var result = confirm('Are you sure you want to delete this data?');
  if(result == true) 
  {
      $(row).parents('tr').remove();
                $.ajax
                ({  
                     url:"deleteemployee.php",  
                     method:"POST",  
                     data:{"employee_ID" : row},
                     //action: "delete",  
                     dataType:"json",  
                     success:function(response)
                     {  
                          
                      getEmprecord();
                     }

                      
              }); 
    }    
}

function update_row(empNum, teamName, empSched, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, empStatus)
{
  $.ajax 
  ({
    url: 'update-Emp.php',
    method: "POST",
    data: {
      "employee_ID" : empNum,
      "team_ID" : teamName,
      "schedule_ID" : empSched,
      "fname" : firstName,
      "mname" : middleName,
      "lname" : lastName,
      "sex" : empGender,
      "date_of_birth" : empBirth,
      "address" : empAddress,
      "mobile_no" : phoneNumber,
      "email" : empEmail,
      "password" : empPassword,
      "is_active" : empStatus
    },
    dataType: "json",
    success: function(dataResult)
    {
          getEmprecord();
          //addNewRowHTML(empNum, teamName, empSched, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, empStatus);       
    }
  });
}
  

$(function() {
  console.log("Ready!");
  getEmprecord();
});
