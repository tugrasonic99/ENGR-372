<?php
include "is-logged-in.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login to Track That</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
<div class="main-container">
    <div class="login-window">
        <form class="login-form" action="" method="post">
            <div class="input-container">
                <h1 class="heading">Track That</h1>
                <h3 class="subheading">Create new user</h3>
            </div>
            <div class="input-container">
                <label class="input-title" for="">Department Id:</label>
                <input class="login-input" type="text" name="company_id" value="" placeholder="Enter Department that you want to join">
            </div>
            <div class="input-container">
                <label class="input-title" for="">Username:</label>
                <input class="login-input" type="text" name="username" value="">
            </div>
            <div class="input-container">
                <label class="input-title" for="">Full Name:</label>
                <input class="login-input" type="text" name="full_name" value="">
            </div>
            <div class="input-container">
                <label class="input-title" for="">Password:</label>
                <input class="login-input" type="password" name="password" value=""
                       placeholder="Create a password with 6-35 digit">
            </div>
            <span class="help-blockk"><p><?php if(!empty($_SESSION["create_err"])) { echo $_SESSION["create_err"]; session_destroy(); } ?></p></span>
            <div class="input-container">
                <input type="submit" name="submit-button" class="input-button" value="Submit"
                       formaction="create-user-action.php">
                <a class="create-user" href="login.php">
                    Login with an existing account
                </a>
            </div>
        </form>
    </div>
</div>
</body>

</html>
