<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/db.php';
use Medoo\Medoo;

    $status = array();
    $status['email'] = "Valid";
    $status['username'] = "Valid";
    $db = new Medoo($cleardb_config);
   
    $data = $db->get('users', ["username","email"],["username"=>$_POST["username"], "email"=>$_POST["email"] ]);
    
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $status['email'] = "Invalid";

    }
    if($data['email'] == $_POST["email"]){
        $status['email'] = "Invalid";
    }
    
    if($data['username'] == $_POST["username"]){
        $status['username'] = "Invalid";
    }
//    echo json_encode($status);
    

    
    
?>
