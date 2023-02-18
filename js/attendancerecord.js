function addRow()
{
   var attendace_ID = $('#attendace_ID').val();
  var schedule_ID = $('#schedule_ID').val();
  var employee_ID = $('#employee_ID').val();
  var time_in = $('#time_in').val();
  var time_out = $('#time_out').text();
  var date_today = $('#date_today').val();
  var has_schedule = $('#has_schedule').val(); 
  var status_timein = $('#status_timein').val();
  var status_timeout = $('#status_timeout').val();
}



function addNewRowHTML(attendace_ID, schedule_ID, employee_ID, time_in, time_out, date_today, has_schedule, status_timein, status_timeout)
{

  var newRow = '<tr>' +
          '<td>' + attendace_ID + '</td>' +
          '<td>' + schedule_ID + '</td>' +
          '<td>' + employee_ID + '</td>' +
          '<td>' + time_in + '</td>' +
          '<td>' + time_out + '</td>' +
          '<td>' + date_today + '</td>' +
          '<td>' + has_schedule + '</td>' +
          '<td>' + status_timein + '</td>' +
          '<td>' + status_timeout + '</td>' +
        '</tr>';
  
  var tableBody = $('#employee-table tbody');
  tableBody.append(newRow);
}

function getEmprecord()
{
  $.ajax ({
    url: 'getattendance.php',
    method: "GET",
    data: {},
    dataType: "json",
    success: function(response) {
      $('#employee-table tbody').empty();

      $.each(response, function(key, value){
        addNewRowHTML(value.attendance_ID, 
          value.schedule_ID, 
          value.employee_ID, 
          value.time_in, 
          value.time_out, 
          value.date_today, 
          value.has_schedule, 
          value.status_timein, 
          value.status_timeout);
      });
    }
  });
}

$(function() {
  console.log("Ready!");
  getEmprecord();
});
