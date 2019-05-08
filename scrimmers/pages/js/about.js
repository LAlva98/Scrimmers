// Just a post handles for the feedback form at the bottom :)
$('#submit').click(function() {
	$.post(
		'/about',
		{message: $('#message').val()},
		function(data) {
			$('#response').text(data);
			$('#submit').prop('disabled',true);
		}
	);
});
