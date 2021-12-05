<?php session_start(); 
require_once "db_config.php";

$issueId = filter_input(INPUT_GET,"issue_Id",FILTER_SANITIZE_STRING); 
$query_Issue = $connection->query("SELECT * FROM Issues WHERE id ='$issueId' ");
$retrieved_Issues = $query_Issue->fetch(PDO::FETCH_ASSOC);
$assign = $retrieved_Issues['assigned_to'];
$query_Users = $connection->query("SELECT firstname,lastname FROM Users WHERE id='$assign'");
$retrieved_User= $query_Users->fetch(PDO::FETCH_ASSOC);
$created_By = $retrieved_Issues['created_by'];
$creator_Query = $connection->query("SELECT firstname,lastname FROM Users WHERE id='$created_By'");
$creator_Name= $creator_Query->fetch(PDO::FETCH_ASSOC);  
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href ="styles.css">
        <script type="text/javascript" src="job_Details.js"></script>
    </head>
    <body>
        <div class="container">
            <header>
                <img src = "images/bug_solid.png">
                <h1> BugMe Issue Tracker </h1>
            </header>
            <div class = "sidenav">
                <ul>
                    <div class = "home">
                        <img src="images/home_icon.svg">
                        <a href="dash_Board.php">Home</a> 
                    </div>

                    <div class = "adduser">
                        <img src = "images/adduser_icon.svg">
                        <a href="add_Users.php">Add User</a> 
                    </div>

                    <div class = "newissue">
                        <img src = "images/newissues_icon.svg">
                        <a href="create_Issue.php">New Issue</a> 
                    </div>
                    <div class = "logout">
                        <img src = "images/logout_icon.svg">
                        <a href="user_Logout.php">Logout</a>

                    </div>
                </ul>  
            </div>

            <h1 id="issue-title"><?php echo $retrieved_Issues["title"]?> </h1>
            <div class ="displayjobdetails">
                <div class = "issuedetails">
                    <h3 id="issue-#" value=<?php echo $retrieved_Issues["id"]?>>Issue #<?php echo $retrieved_Issues["id"]?></h3>
                    <p id="issue-des"><?php echo $retrieved_Issues["description"]?> </p>
                    <p id="issue-create"> > Issue created on <?php echo $retrieved_Issues["created"]?> by <?php echo $creator_Name['firstname']." ".$creator_Name['lastname']; ?> </p>
                    <p id="issue-update"> > Issue updated on <?php echo $retrieved_Issues["updated"]?></p>
                </div>
                

                <div class = "aside">
                    <div class = "tab">
                        <h3> Assigned To</h3>
                        <p><?php echo $retrieved_User['firstname']." ".$retrieved_User['lastname']; ?> </p>

                        <h3> Type </h3>
                        <p><?php echo $retrieved_Issues["type"] ?> </p>

                        <h3> Priority </h3>
                        <p><?php echo $retrieved_Issues["priority"] ?> </p>

                        <h3> Status</h3>
                        <p><?php echo $retrieved_Issues["status"] ?></p>
                    </div><br>
                
                    <div class = "buttons">
                        <button type="submit" id="closed"> Mark as Closed </button><br><br>
                        <button type="submit"  id="inprogress"> Mark in Progress </button>
                    </div>
                    <div id="result"></div>
                </div>

            </div>
        </div>
    </body>
</html>