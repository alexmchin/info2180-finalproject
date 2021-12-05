<?php 
    session_start();
    require_once "db_config.php";
	
    if (!isset($_SESSION['activeUser'])){
        header('Location: user_Logout.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="dash_Board.js"></script>
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
                        <a href="dash_Board.php" id="load_Dashboard"> Home </a> 
                    </div>

                    <div class = "adduser">
                        <img src = "images/adduser_icon.svg">
                        <a href="addusers.php">Add User</a> 
                    </div>

                    <div class = "newissue">
                        <img src = "images/newissue_icon.svg">
                        <a href="createissue.php">New Issue</a> 
                    </div>
                    <div class = "logout">
                        <img src = "images/logout_icon.svg">
                        <a href="user_Logout.php">Logout</a>
                    </div>
                </ul>  
            </div>

            <div class ="display">
                
                <div class = "issues">
                    <?php if(isset($_SESSION["denied"])){ ?>
                    <p id="notadmin">
                        <?php echo $_SESSION['activeUser']." is not an admin. Only admins are allowed to add users" ?>
                    </p>
                    <?php }?>   
                    <h1>Issues</h1>
                    <button onclick = "location.href = 'create_Issue.php';" id= "createnewissue"> Create New Issue </button>
                </div>
                <div class = "filterby">
                    <h3> Filter by: </h3>
                    <div class="navbar">
                        <nav>   
                            <ul>
                                <li><button id="allIssuesBtn">  All </button></li>
                                <li><button id="openIssuesBtn">  Open </button> </li>
                                <li><button id="myTicketsBtn">  My Tickets </button></li>
                            </ul>
                        </nav>    
                    </div>
                </div>
            <div id="result"></div>
        </div>
    </body>
</html> <?php $_SESSION["denied"]=null;?>
