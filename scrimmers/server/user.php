<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/db.php';
use Medoo\Medoo;
	
session_start();
$db = new Medoo($cleardb_config);
	
$data = $db->get('users', ["username","email"],["username[=]"=>$_SESSION['atPage']]);
	
/*
var_dump($_POST);
var_dump($_SESSION);
var_dump($data);
*/
//exit;
	

// Provided by user when the request a message to be sent
$address = $_SESSION['email'];
$name = $_SESSION['username'];
$body = $_POST['msg'];

$mail = new \SendGrid\Mail\Mail();

// This is the most important field to set in the email's headers
$mail->addTo($data['email'], $data['username']);

// Setting up some of the email header data
	// Keep in mind these dont'really do much for actual control
$mail->setSubject($_SESSION['username']." wants to talk");
$mail->setFrom('scrimmers.mail@scrimmers.gg', $name);
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
	echo 'Message Sent';
}
catch(Exception $e) {
	echo 'Caught: ' . $e->getMessage() . "\n";
}

?>
