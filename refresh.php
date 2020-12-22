<?php
require_once "config.php";
session_start();
$username="";
$username = $_SESSION["username"];

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $sql = 'UPDATE `orderlist` SET status="done" WHERE customer = "' . $username . '" AND status="In progress" LIMIT 1 ' ;
    $result = mysqli_query($link, $sql);
    header("Location: status-show.php");
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

