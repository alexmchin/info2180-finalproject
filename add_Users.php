<?php session_start();
    require_once 'db_config.php';
    
    if (!isset($_SESSION['activeUser']))
    {
    header('Location: user_Logout.php');
    }

    if($_SESSION['activeUser'] != 'admin@project2.com'){
        $_SESSION["denied"] = "denied";
        header("Location: dash_Board.php");
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="add_User.js"></script>
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

            <div id="form1">
                <h1>New User</h1>
                <form id="newuser">
                    <label> Firstname </label><br>
                    <input type="text" name="firstname" id="firstname"><br>

                    <label> Lastname </label><br>
                    <input type="text" name="lastname" id="lastname"><br>

                    <label> Password </label><br>
                    <input type="password" name="password" id="passwd"><br>

                    <label> Email </label><br>
                    <input type="email" name="email" id="email"><br><br>

                    <button type="submit" name="form1btn" id="add_UserBtn"> Submit </button>

                </form>
                <div id="result"></div>
            </div>
        </div>
    </body>
</html>
    