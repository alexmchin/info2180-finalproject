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
        $idsQuery = $connection->query("SELECT id FROM Users WHERE CONCAT(firstname,' ',lastname)='$assignto' ");
        $idsResult = $idsQuery->fetch(PDO::FETCH_ASSOC);
        if(isset($idsResult)){
            $assignid=$idsResult['id'];
        }
        $insertData = $connection->prepare('INSERT INTO Issues (title, _description, _priority, _type, _status, assigned_to, created_by, created, updated)
        VALUES ( :title, :_description,:priority,:_type,:_status,:assignid,:createid , NOW(), NOW());');
        $insertData->bindParam(":title",$title);
        $insertData->bindParam(":_description", $description);
        $insertData->bindParam(":priority", $priority);
        $insertData->bindParam(":_type", $type);
        $insertData->bindParam(":_status",$status);
        $insertData->bindParam(":createid", $sessionid);
        $insertData->bindParam(":assignid", $assignid);
        $insertData->execute();
        ;
    }echo"Issue successfully inserted."
?>

