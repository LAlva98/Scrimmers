//$("#filter").on("click",function () {
	console.log("works");
	$.ajax({
		url:"/server/admin.php",
		type:"GET",
		dataType:"json",
		success:function (data) {
			console.log(data);
			for (var i = 1; i < data.length; i++) {
				var key = data[i];
				$("#results").append("<tr><td>" + key['username'] + "</td><td>" + key['email'] + "</td><td>  <button type='button' onclick = 'removeUser(this)' id='"+key['username'] + "' value='"+key['username']+ "'>Delete</button> <button type='button' onclick = 'promote(this)' id='"+key['username'] + 1 + "' value ='" + key['email'] + "'>Promote</button></td></tr>");//"' id='"+key['username']+
				//<button type='button' value='"+key['username']+"'>Promote</button>
//				$("#filteredTeams").append("<tr><td>" + key['username'] + "</td><td>" + key['email'] + "</td><td> <input type='checkbox' id='demo-copy' name='demo-copy'> </td></tr>");
			}
		}
	});
//});
//<input type="checkbox" id="demo-copy" name="demo-copy">

//$("button").click(function () {
//	var currentBtn = $(this).val();
//	console.log(currentBtn);
//});

function removeUser(test) {
//	console.log(test.id);
	$.post(
		"/server/remove.php",
		{
			remUser:test.id,
		},
		function(data) {
			console.log(data);
		},
		"json"
	);
}
function promote(test) {
//	console.log(test.id);
//	var test = $(test).val()
//	console.log(test);
	$.post(
		"/server/promote.php",
		{
			promUser:test.id,
			email:$(test).val(),
		},
		function(data) {
			console.log(data);
		},
		"json"
	);
}