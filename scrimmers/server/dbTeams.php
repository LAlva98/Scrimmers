<?php
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/db.php';
    use Medoo\Medoo;
	session_start();
    $temp = $_SESSION['game'];
   
//    $db = new Medoo($cleardb_config);
    $db = new Medoo(array(
        'database_type' => 'mysql',
        'database_name' => getenv('CLEARDB_NAME'),
        'server' => getenv('CLEARDB_HOST'),
        'username' => getenv('CLEARDB_USERNAME'),
        'password' => getenv('CLEARDB_PASSWORD')
    ));
    
    $data = $db->select('teams', ["captain","team_name", "team_bio", "region"],["region[=]"=>$_POST["regions"], "game[=]"=>$temp]);

    echo json_encode($data);
    

    
    ?>
