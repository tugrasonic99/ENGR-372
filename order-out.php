<?php
require_once "config.php";
session_start();
$username="";
$username = $_SESSION["username"];
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $sql = 'DELETE FROM `orderlist` WHERE customer = "' . $username . '" AND status="done"';

    $result = mysqli_query($link, $sql);
echo 'All procedures have been completed, you can take your products.';?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Track That - Home</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    
<a href="index.php"><button class="button" type="button">Main Page</button></a>
<a href="index.php?logout=true"><button class="input-button" type="button">logout</button></a>
<a href="order-new.php"><button type="button">Create an Order</button></a>

</body>
</html>


