$('#submit').click(function () {
	$.post(
		'/login',
		{
			username: $('#username').val(),
			password: $('#password').val()
		},
		function(data) {
			$('#response').html(data);
			if(data.includes('success')) {
				// now we can redirect the user to the homepage
				// session should now be started and they will be logged in
				window.location.replace("/");
			}
		}
	);
});
