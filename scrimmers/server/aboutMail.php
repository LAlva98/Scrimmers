<?php
require __DIR__ . '/../vendor/autoload.php';

$address = 'user@about.page';

$name = 'Anonymous';

$body = $_POST['message'];

$mail = new \SendGrid\Mail\Mail();

// This is the most important field to set in the email's headers
$mail->addTo('butwhytho@protonmail.com', 'Dev Team');

// Setting up some of the email header data
	// Keep in mind these dont'really do much for actual control
$mail->setSubject('Direct User Feedback');
$mail->setFrom($address, $name);
// make sure to treat the body as plain text to not allow any cheesy html <script> injection
$mail->addContent('text/plain', $body);

// Finally we send our key using the sendgrid api
$send = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
	$response = $send->send($mail);
	// now some debugging things
	/*
	print $response->statusCode() . "\n";
	print_r($response->headers());
	print $response->body() . "\n";
	*/
	echo 'Thank you for the feed back :^)';
}
catch(Exception $e) {
	echo 'Caught: ' . $e->getMessage() . "\n";
}

?>
