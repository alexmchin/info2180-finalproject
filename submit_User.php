<?php session_start();
    require_once 'db_config.php';

    $first_name = filter_input(INPUT_GET,"firstname",FILTER_SANITIZE_STRING); 
    $last_name = filter_input(INPUT_GET,"lastname",FILTER_SANITIZE_STRING); 
    $passwd = filter_input(INPUT_GET,"passwd",FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_GET,"email",FILTER_SANITIZE_EMAIL); 
    $email = filter_var($email,FILTER_VALIDATE_EMAIL);
    $insert = true;
    $data = array($first_name,$last_name,$passwd,$email);
    foreach ($data as $element):
        if(!preg_match("^(?=.*[A-Z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$", $element) && ($element==$passwd)){
            echo "<br>not match";
            $insert=false;
        }
        else if (empty($element)){
            echo "There is no data.";
            $insert = false; 
        }
    endforeach;
    $hashpassword=password_hash($passwd,PASSWORD_DEFAULT);
    if ($insert){
        $filtered_Data = $connection->prepare('INSERT INTO Users(firstname,lastname,userPassword,email,date_joined)
        VALUES (:first_name,:last_name,:hashpassword,:email,NOW());');
        $filtered_Data->bindParam(":first_name",$first_name);
        $filtered_Data->bindParam(":last_name", $last_name);
        $filtered_Data->bindParam(":hashpassword", $hashpassword);
         $filtered_Data->bindParam(":email", $email);
        $filtered_Data->execute();
        echo"<br> User successfullly inserted";
    }
    