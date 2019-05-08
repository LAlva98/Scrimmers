<?php
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/db.php';
    use Medoo\Medoo;
    session_start();
    $db = new Medoo($cleardb_config);
    $email = $_SESSION['email'];    
    $db->update('users', [
        'user_schedule'=>$_POST['schedule']
    ],
    [
        'email'=>$email
    ]);

    echo $_SESSION['username'];
?>