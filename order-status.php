<?php
require_once "config.php";
session_start();
$username="";
$username = $_SESSION["username"];
$status='In progress';

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $ord="";
   // $ord=$_POST['ord'];
    //$sql = "INSERT INTO  `orderlist` (`delivery`, `customer`,`status`) VALUES(?,?,?)";

    

    if(isset($_POST['submit']))
{		
    $ord=$_POST['ord'];
    $sql = "INSERT INTO  `orderlist` (`delivery`, `customer`,`status`) VALUES(?,?,?)";
    $stmt = mysqli_prepare($link,$sql);
    $stmt->bind_param("sss",$_POST['ord'],$username,$status);
    $stmt->execute();
    $result = mysqli_query($link, $sql);
    echo '<a href="status-show.php"><button type="button">Success</button></a>';

    /*if(!result)
    {
        echo mysqli_error();
    }
    else
    {
        echo "Records added successfully.";
}*/}
?>