<?php
require_once "config.php";
session_start();
$username="";
$username = $_SESSION["username"];

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $sql = 'SELECT * FROM `orderlist` WHERE customer = "' . $username . '"';

    $result = mysqli_query($link, $sql);
    echo"<br><br><br><br><br><br><br><br><br>";
    echo "<div class='content'>";
    echo"<table style='width:500px; border: 1px solid black'>";
    echo"<tr><td>Delivery</td><td>Customer</td><td>Status</td></tr>\n ";
    $row=mysqli_fetch_assoc($result);
    while($row){
        echo"<tr><td>".$row['delivery']."</td><td>".$row['customer']."</td><td>".$row['status']."</td></tr>\n ";
        $row=mysqli_fetch_assoc($result);
    }
    
    echo "</table>";
    echo "</div>";

?>

<!-- zz --><!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/master.css">
        <link rel="stylesheet" href="css/welcome.css">
    <title>Data Page</title>
</head>

<style>
    .content {
  max-width: 500px;
  margin: auto;
}



    </style>
    
<body >
    <div class="global-header">
        <div class="global-container">
 <div class="content">   
<a href="index.php?logout=true"><button class="input-button" type="button">logout</button></a>
<a href="order-new.php"><button class="input-button" type="button">Create an Order</button></a>
<a href="refresh.php"><button class="input-button" type="button">Refresh</button></a>
<a  href="order-out.php"><button class="input-button" type="button">Finish</button></a>
<a  href="index.php"><button class="input-button" type="button">Main Page</button></a>
</div>
        </div></div>
</body>
</html>