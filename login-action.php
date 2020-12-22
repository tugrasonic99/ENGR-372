<?php

require_once "config.php";

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    echo "connection succesfull";
}
// initialize username and password variable
$username = $password = "";

// assign given username and password in the login form to the variables
$username = $_POST["username"];
$password = $_POST["password"];

// create sql query sentence to check that username exists
$sql = 'SELECT username, password FROM `users` WHERE username = "' . $username . '"';

// query with connection and sql
$result = mysqli_query($link, $sql);

/* if there is a result then take the result,
 * check if the input password matches with users password,
 * if it is, add variables to the session and redirect to the index
 */
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if (!empty($row)) {
        if ($password === $row["password"]) {
            session_start();
            $_SESSION["username"] = $row["username"];
            $_SESSION["is_logged_in"] = true;

            header("Location: index.php");

        } else {
            session_start();
            $_SESSION["login_err"] = "password and username did not matched.";
            header("Location: login.php");
        }
    } else {
        $_SESSION["login_err"] = "password and username did not matched..";
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}

exit();
