<?php session_start();
    require_once "db_config.php";
	if (!isset($_SESSION['activeUser']))
    {
    header('Location: user_Logout.php');
    }
    $usersQuery = $connection->query("SELECT * FROM Users");
    $retrievedUsers = $usersQuery->fetchAll(PDO::FETCH_ASSOC);

    $value = 0;
 
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="submit_Issues.js" type="text/javascript"></script>
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
                        <a href="dash_Board.php"> Home </a> 
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

        <div id="newissueform">
            <h1> Create New Issue </h1>
            <form id="createIssue"  method="post">
                <label> Title </label><br>
                <input type="text" name="title" id="title"><br>
                <label> Description </label><br>
                <textarea type="text" id="description" name="description"></textarea><br>

                <label> Assigned To </label><br>
                    <select id="assignedto" name="assignedto">
                        <option id="select">Please Select</option>
                        <?php foreach ($retrievedUsers as $user): ?>
                        <option> <?php echo $user['firstName']." ".$user['lastName']; ?> </option>
                        <?php endforeach; ?>  
                    </select><br>

                

                <label> Type </label><br>
                <select id="type" name="type">
                    <option value="Bug"> Bug </option>
                    <option value="Proposal"> Proposal </option>
                    <option value="Task"> Task </option>
                </select><br>

                <label> Priority </label><br>
                <select id="priority" name="priority">
                    <option value="Major"> Major </option>
                    <option value="Minor"> Minor </option>
                    <option value="Critical"> Critical </option>
                </select><br><br>

                <button type="submit" name="cissue" id="create_Issue"> Submit </button>
            </form>
        </div>
        <div id="result"> </div>
    </div>
    </body> 
</html>