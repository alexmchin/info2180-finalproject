<?php require_once "db_config.php";

    $issue_Id = filter_input(INPUT_GET,"id",FILTER_SANITIZE_STRING);
    $update_Status = filter_input(INPUT_GET,"update",FILTER_SANITIZE_STRING);
    $issue_Update = $connection->prepare("UPDATE Issues SET status =:update_Status, updated=NOW() WHERE id =:id");
    $issue_Update->bindParam(":update_Status", $update_Status);
    $issue_Update->bindParam(":id", $issue_Id);
    $issue_Update->execute();
    echo "Updated";
?>