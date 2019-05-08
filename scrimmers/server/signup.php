<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/db.php';
require __DIR__ . '/validate.php';
use Medoo\Medoo;
		if($status['email'] == "Invalid" || $status['username'] == "Invalid"){
			echo json_encode($status);
			exit;
		}
		
		if( isset($_SESSION['email']) || isset($_SESSION['username']) ) {
			exit;
		}
//		echo json_encode($data);
		$db = new Medoo($cleardb_config);
		
		$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
		$db->insert('users',[
			"username" => $_POST["username"],
			"email" => $_POST["email"],
			"password" => $hashedPassword
		]);

		// Setup the session vars and respond
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['username'] = $_POST['username'];
		echo 'success';

?>
