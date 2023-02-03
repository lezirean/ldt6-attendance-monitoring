var _row = null;



function addRow()
{
	var teamName = $('#team-name').val();
	var teamID = $('#team-id').val();
	
	console.log(teamName);
	console.log(teamID);
	
	
	var newRow = '<tr>' +
					'<td>' + teamName + '</td>' +
					'<td>' + teamID + '</td>' +
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
	$("#team-name").val($(col[0]).text());
	$("#team-id").val($(col[1]).text());
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
	$('#team-name').val('');
	$('#team-id').val('');
	$("#save").text("Save");
	$("#close").text("Close");
	$("#exampleModalLabel").text("Add Record");
	
}