<?php
	require __DIR__ . '/../vendor/autoload.php';
	require __DIR__ . '/db.php';
	use Medoo\Medoo;
	
	
	$db = new Medoo($cleardb_config);
	
	
	
	$data = $db->delete('users', ["username"=>$_POST["remUser"]]);
	
//	echo json_encode("success");
?>