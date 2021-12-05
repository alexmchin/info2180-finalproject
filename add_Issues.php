<?php session_start(); 
require_once "db_config.php";

    $title = filter_input(INPUT_GET,"title",FILTER_SANITIZE_STRING); 
    $description = filter_input(INPUT_GET,"description",FILTER_SANITIZE_STRING); 
    $assignto = filter_input(INPUT_GET,"assignedto",FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_GET,"type",FILTER_SANITIZE_STRING); 
    $priority = filter_input(INPUT_GET,"priority",FILTER_SANITIZE_STRING);
    $status = "OPEN";
    $insert = true;
    $sessionid = $_SESSION['user_id'];
    if ($insert){
        $idsQuery = $connection->query("SELECT id FROM Users WHERE CONCAT(firstname,' ',lastname)='$assignto'");
        $idsResult = $idsQuery->fetch(PDO::FETCH_ASSOC);
        if(isset($idsResult)){
            $assignid=$idsResult['id'];
        }
        $insertData = $connection->prepare('INSERT INTO Issues (title, description, priority, type, status, assigned_to, created_by, created, updated)
        VALUES ( :title, :description,:priority,:type,:status,:assignid,:createid , NOW(), NOW());');
        $insertData->bindParam(":title",$title);
        $insertData->bindParam(":description", $description);
        $insertData->bindParam(":priority", $priority);
        $insertData->bindParam(":type", $type);
        $insertData->bindParam(":status",$status);
        $insertData->bindParam(":createid", $sessionid);
        $insertData->bindParam(":assignid", $assignid);
        $insertData->execute();
        ;
    }echo"Issue successfully inserted."
?>

