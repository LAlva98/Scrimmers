<?php
require __DIR__ . '/navbar.php';
require __DIR__ . '/db.php';
require __DIR__ . '/../vendor/autoload.php';
use Medoo\Medoo;

if(activeUser()) {
	exit;
}
	
$db = new Medoo($cleardb_config);

$users = $db->select('users', ['username', 'password']);
$user = $db->get(
	'users', 
	['email', 'password', 'username'], 
	['username'=>$_POST['username']]
);
if($user == null) {
	echo "<p style=\"color:red;\">Username not found!</p>";
}
else {
	$hash = substr($user['password'], 0, 60);
	if(password_verify($_POST['password'], $hash)) {
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
