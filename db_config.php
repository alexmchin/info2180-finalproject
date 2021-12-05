<?php
    $host = 'localhost';
    $db_name = 'bugme';
    $user_name = 'root';
    $pass_word = ''; 

    $dsn = "mysql:host=$host;dbname=$db_name;";
    $connection = new PDO($dsn, $user_name, $pass_word);
    /*echo "Connected to DB";
    /*try{
        $connection = new PDO($dsn, $user_name, $pass_word);
        if ($connection){
            echo "Connected to DB";
        }
    }catch (PDOException $e){
        echo $e->getMessage();
    }*/
?>