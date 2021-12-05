<?php
	if(isset($_SESSION['activeUser'])){
        header("Location:http://localhost/webdev/dash_Board.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "styles.css">
        <script type="text/javascript" src="loginValidate.js"></script>
        
    </head>
    <body>
        <div class="container">
            <header>
                <img src = "images/bug_solid.png">
                <h1> BugMe Issue Tracker </h1>
            </header>
            <div id="loginDiv">
                <h1 id="loginHeader">User Login</h1>
                <form id = "loginForm" method = "post" onsubmit = "return validateUser()">
                    <label> E-mail: </label>
                    <br>
                    <input type="email" name="user_email" id="email">
                    <br>
                    <label> Password: </label>
                    <br>
                    <input type="password" name="user_password" id="passwd">
                    <br><br>
                    <button type="submit" name="login_button" id="login_button"> Login </button>
                </form>
                <span id="checkForError"></span>
            </div>
        </div>
    </body>
</html>

<?php if (isset($_POST['login_button'])){
    include('user_Login.php');
}
?>