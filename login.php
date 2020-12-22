<?php include "is-logged-in.php"; ?>

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
        <form class="login-form" method="post" action="">
            <div class="input-container">
                <h1 class="heading">Track That</h1>
                <h3 class="subheading">Login</h3>
            </div>
            <div class="input-container">
                <label class="input-title">Username:</label>
                <input class="login-input" type="text" name="username" value="">
            </div>
            <div class="input-container">
                <label class="input-title">Password:</label>
                <input class="login-input" type="password" name="password" value="">
            </div>
            <span class="help-blockk"><p><?php if(!empty($_SESSION["login_err"])) { echo $_SESSION["login_err"]; session_destroy(); } ?></p></span>
            <div class="input-container">
                <input type="submit" name="submit-button" class="input-button" value="Login"
                       formaction="login-action.php">
                <a class="create-user" href="createuser.php"> Create new user</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
