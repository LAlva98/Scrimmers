<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/navbar.php';
require __DIR__ . '/db.php';

use Medoo\Medoo;

$username = $_POST['username'];
$password = $_POST['password'];

if(activeUser()) {
	exit;
}

$db = new Medoo($cleardb_config);

$user = $db->get(
	'admins',
	['username','email', 'password'],
	['username'=>$_POST['username']]
);

if($user == null) {
	echo '<p style="color:red;">Account not found</p>';
	exit;
}
else {
	//$hash = substr($user['password'], 0, 60);
	//if(password_verify($_POST['password'], $hash)) {
	if($user['password'] == $password) {
		echo '<p style="color:green;">success</p>';
		// index exposes sessions for us already
		$_SESSION['email'] = $user['email'];
		$_SESSION['username'] = $user['username'];
	}
	else {
		echo "<p style=\"color:red;\">Bad password</p>";
	}
}
?>
