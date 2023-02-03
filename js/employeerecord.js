var _row = null;



function addRow()
{
	var firstName = $('#first-name').val();
	var lastName = $('#last-name').val();
	var empEmail = $('#emp-email').val();	
	var phoneNumber = $('#phone-number').val();	 
	var teamName = $('#team-name option:selected').text();
	var empStatus = $('#emp-status option:selected').text();
	
	console.log(firstName);
	console.log(lastName);
	console.log(empEmail);
	console.log(phoneNumber);
	console.log(teamName);
	console.log(empStatus);
	
	
	var newRow = '<tr>' +
					'<td>' + firstName + '</td>' +
					'<td>' + lastName + '</td>' +
					'<td>' + empEmail + '</td>' +
					'<td>' + phoneNumber + '</td>' +
					'<td>' + teamName + '</td>' +
					'<td>' + empStatus + '</td>' +
					'<td><button class="btn btn-info" onClick="editRow(this);">Edit</button></td>' +
					'<td><button class="btn btn-danger" onClick="deleteRow(this);">Delete</button></td>' +
				'</tr>';
	
	var tableBody = $('#employee-table tbody');
	tableBody.append(newRow);
	
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
	$("#first-name").val($(col[0]).text());
	$("#last-name").val($(col[1]).text());
	$("#emp-email").val($(col[2]).text());
	$("#team-name option:selected").val($(col[3]).text());
	$("#emp-status option:selected").val($(col[4]).text());
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
	$('#first-name').val('');
	$('#last-name').val('');
	$('#emp-email').val('');	
	$('#team-name').prop("selectedIndex",0);
	$('#emp-status').prop("selectedIndex",0);
	$("#save").text("Save");
	$("#close").text("Close");
	$("#exampleModalLabel").text("Add Record");
	
}