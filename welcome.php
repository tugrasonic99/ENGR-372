<?php
session_start();


$is_logged_in = "";
if (!empty($_SESSION["is_logged_in"])) {
    $is_logged_in = $_SESSION["is_logged_in"];
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/master.css">
        <link rel="stylesheet" href="css/welcome.css">
        <title>Welcome to Track That</title>
    </head>
    <body>
        <header class="global-header">
            <div class="global-content">
                <div class="global-logo">
                    <a href="welcome.php">
                        <img src="img/head-logo.svg" alt="">
                    </a>
                </div>
                <div class="global-header-left">
                    <a class="create-user" href="createuser.php">Create new user</a>
                    <button class="input-button" onclick="location.href='login.php'" type="button" name="button">Login</button>
                </div>
            </div>
        </header>
        <div class="main-content">
            <h1 class="main-content-header">Welcome to Track That</h1>
            <p class="main-content-p">
                Track-that is a platform that you, as a member of our association, can see the progress of your product that is currently on an assembly or in maintanence.
            </p>
            <p class="main-content-p">
                By using this platform, you can keep up with the latest news on your desired product.
            </p>
        </div>
    </body>
</html>
