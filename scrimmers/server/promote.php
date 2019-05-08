<?php
	require __DIR__ . '/../vendor/autoload.php';
	require __DIR__ . '/db.php';
	use Medoo\Medoo;
	
	$test = substr($_POST["promUser"],0,-1);
	$db = new Medoo($cleardb_config);

	
	
	$data = $db->insert('admins', [
	"username"=>$test,
	"email"=>$_POST["email"],
	"password"=>"admin"
	]);
	echo json_encode("promoted");
?>