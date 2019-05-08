<?php
$cleardb_config = array(
		'database_type' => 'mysql',
		'database_name' => getenv('CLEARDB_NAME'),
		'server' => getenv('CLEARDB_HOST'),
		'username' => getenv('CLEARDB_USERNAME'),
		'password' => getenv('CLEARDB_PASSWORD')
);
?>
