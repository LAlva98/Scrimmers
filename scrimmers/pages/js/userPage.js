$("#submit").click(function () {
	console.log("sending user mail");
	$.post(
		"/server/user.php",
		{
			msg:$("#message").val(),
		},
		function (data) {
			$("#submit").prop("disabled",true);
			console.log(data);
		}
	);
});
