<?php
require_once "config.php";
session_start();
$username="";
$username = $_SESSION["username"];

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $sql = 'SELECT * FROM `orderlist` WHERE customer = "' . $username . '"';

    $result = mysqli_query($link, $sql);
    echo"<table border='1'>";
    echo"<tr><td>Delivery</td><td>Customer</td><td>Status</td></tr>\n ";
    $row=mysqli_fetch_assoc($result);
    while($row){
        echo"<tr><td>".$row['delivery']."</td><td>".$row['customer']."</td><td>".$row['status']."</td></tr>\n ";
        $row=mysqli_fetch_assoc($result);
    }
    
    echo "</table>";

?>

<!-- zz --><!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Track That - Home</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>

<a href="index.php?logout=true"><button class="input-button" type="button">logout</button></a>
<a href="order-new.php"><button type="button">Create an Order</button></a>
<a href="refresh.php"><button type="button">Refresh</button></a>
<a href="order-out.php"><button type="button">Finish</button></a>
</body>
</html>