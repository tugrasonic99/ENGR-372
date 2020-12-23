<?php
require_once "config.php";

session_start();


if (empty($_SESSION["is_logged_in"])) { // if there is no user logged in if returns null, and redirect to the login page
    header("Location: welcome.php");
} elseif ($_SESSION["is_logged_in"] == true) { // if there is a user;

    $username = $full_name = $id = $company_id = "";

    $username = $_SESSION["username"];

    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $sql = 'SELECT * FROM `users` WHERE username = "' . $username . '"';

    $result = mysqli_query($link, $sql);

    /*
     * take the information about user;
     * if user doesn't exist, redirect to the login page
     * if user logged out, redirect to the login page
     */
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (!empty($row)) {
            //$id = $_SESSION["id"] = $row["id"];
            $full_name = $_SESSION["full_name"] = $row["full_name"];
            $company_id = $_SESSION["company_id"] = $row["company_id"];
        } else {
            $_SESSION["login_err"] = "password and username did not matched..";
            header("Location: login.php");
        }
    } else {
        header("Location: login.php");
    }

}

//when get "logout" set delete all te session and go to the login page
if(isset($_GET["logout"])) {
    session_destroy();
    header("Location: login.php");
}

?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Track That - Home</title>
    <link rel="stylesheet" href="css/master.css">
        <link rel="stylesheet" href="css/welcome.css">
            
</head>
<style>.content {
  max-width: 500px;
  margin: auto;
}</style>
<body>
    <div class="content">
    <div class="global-header">
        <div class="global-container">
<h1>Welcome <?php echo $full_name; ?>!</h1>
<h3>Department: <?php echo $company_id; ?></h3>
<a href="index.php?logout=true"><button class="input-button" type="button">logout</button></a>
<a href="status-show.php"><button class="input-button" type="button">Show Status</button></a>
<a href="order-new.php"><button class="input-button" type="button">Create an Order</button></a>
        </div></div></div>
</body>
</html>
