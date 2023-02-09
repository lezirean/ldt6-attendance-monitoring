var _row = null;



function addRow()
{
	var empNum = $('#emp-num').val();
	var firstName = $('#first-name').val();
	var middleName = $('#middle-name').val();
	var lastName = $('#last-name').val();
	var empGender = $('#emp-gender option:selected').text();
	var empPassword = $('#emp-password').val();
	var empEmail = $('#emp-email').val();	
	var phoneNumber = $('#phone-number').val();
	var empAddress = $('#emp-address').val();
	var empBirth = $('#emp-birth').val();	 
	var teamName = $('#team-name option:selected').text();
	var empSched = $('#emp-sched option:selected').text();
	var empStatus = $('#emp-status option:selected').text();
	
	console.log(empNum);
	console.log(firstName);
	console.log(middleName);
	console.log(lastName);
	console.log(empGender);
	console.log(empPassword);
	console.log(empEmail);
	console.log(phoneNumber);
	console.log(empAddress);
	console.log(empBirth);
	console.log(teamName);
	console.log(empSched);
	console.log(empStatus);
	
	
	insertEmprecord(empNum, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, teamName, empSched, empStatus);
	
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
	$("#first-name").val($(col[1]).text());
	$("#middle-name").val($(col[2]).text());
	$("#last-name").val($(col[3]).text());
	$("#emp-gender option:selected").val($(col[4]).text());
	$("#emp-password").val($(col[5]).text());
	$("#emp-email").val($(col[6]).text());
	$("#phone-number").val($(col[7]).text());
	$("#emp-address").val($(col[8]).text());
	$("#emp-birth").val($(col[9]).text());
	$("#team-name option:selected").val($(col[10]).text());
	$("#emp-sched option:selected").val($(col[11]).text());
	$("#emp-status option:selected").val($(col[12]).text());
	$("#exampleModalLabel").text("Edit Record");
	$("#addModal").modal("toggle");
	
}
function save()
{
	if($("#save").text() == "Save Edit")
		editRow2();
	else 
	{
		$('#employee-table tbody').append(addRow());
		$('#addModal').modal('hide');		   		
		clearAll();	
	}
}
function editRow2()
{
		$(_row).after(addRow());
	    // Remove original product
	    $(_row).remove();
		
		$('#addModal').modal('hide');		   		
		clearAll();
	
}

function clearAll()
{
	$('#emp-num').val('');
	$('#first-name').val('');
	$('#middle-name').val('');
	$('#last-name').val('');
	$("#emp-gender").prop("selectedIndex",0);
	$("#emp-username").val('');
	$("#emp-password").val('');
	$('#emp-email').val('');	
	$("#phone-number").val();
	$("#emp-address").val('');
	//$("#emp-birth").val($('');
	$('#team-name').prop("selectedIndex",0);
	$('#emp-sched').prop("selectedIndex",0);
	$('#emp-status').prop("selectedIndex",0);
	$("#save").text("Save");
	$("#close").text("Close");
	$("#exampleModalLabel").text("Add Record");
	
}

function addNewRowHTML(empNum, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, teamName, empSched, empStatus)
{
	var newRow = '<tr>' +
					'<td>' + empNum + '</td>' +
					'<td>' + firstName + '</td>' +
					'<td>' + middleName + '</td>' +
					'<td>' + lastName + '</td>' +
					'<td>' + empGender + '</td>' +
					'<td>' + empPassword + '</td>' +
					'<td>' + empEmail + '</td>' +
					'<td>' + phoneNumber + '</td>' +
					'<td>' + empAddress + '</td>' +
					'<td>' + empBirth + '</td>' +
					'<td>' + teamName + '</td>' +
					'<td>' + empSched + '</td>' +
					'<td>' + empStatus + '</td>' +
					'<td><button class="btn btn-info" onClick="editRow(this);">Edit</button></td>' +
					'<td><button class="btn btn-danger" onClick="deleteRow(this);">Delete</button></td>' +
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
							  value.fname,
							  value.mname, 
							  value.lname,
							  value.sex,
							  value.password,
							  value.email,
							  value.mobile_no,
							  value.address,
							  value.date_of_birth, 
							  value.team_ID, 
							  value.schedule_ID,         
							  value.is_active);
			});
		}
	});
}

function insertEmprecord(empNum, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, teamName, empSched, empStatus)
{
	$.ajax 
	({
		url: '../pages/insertEmp-record.php',
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
		success: function(id) {
			if(id != 0)
			{
				addNewRowHTML(empNum, firstName, middleName, lastName, empGender, empPassword, empEmail, phoneNumber, empAddress, empBirth, teamName, empSched, empStatus);
			}
			else
			{
				alert("Insert Failed: something went wrong.");
			}
		}
	});
}

$(function() {
	console.log("Ready!");
	getEmprecord();
});