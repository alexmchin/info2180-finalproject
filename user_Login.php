<?php session_start();
require 'db_config.php';
    
    $user_email = filter_input(INPUT_POST, "user_email", FILTER_SANITIZE_EMAIL); 
    $user_password = filter_input(INPUT_POST, "user_password", FILTER_SANITIZE_STRING);
    $user_email = filter_var($user_email, FILTER_VALIDATE_EMAIL); 
    $passwdCheck = $connection->query("SELECT userPassword FROM Users WHERE email='$user_email'");
    $verifiedPasswd = $passwdCheck->fetch(PDO::FETCH_ASSOC);
    
    if(isset($verifiedPasswd)){
        $hashedPasswd = $verifiedPasswd['userPassword'];
    }
    
    if(password_verify($user_password, $hashedPasswd)){
        $findDB_Info = $connection->query("SELECT * FROM Users WHERE userPassword = '$hashedPasswd' AND email ='$user_email'");
        $findDB_Info = $findDB_Info->fetch(PDO::FETCH_ASSOC);
        if(isset($findDB_Info)){
            $_SESSION['activeUser'] = $findDB_Info['email'];
            $_SESSION['firstname'] = $findDB_Info['firstname'];
            $_SESSION['lastname'] = $findDB_Info['lastname'];
            $_SESSION['user_id'] = $findDB_Info['id'];
            if(isset($_SESSION['activeUser'])){
            header("Location:dash_Board.php" );
            }
        }
    }
    ?>