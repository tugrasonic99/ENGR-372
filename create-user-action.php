<?php

require_once "config.php";

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    echo "connection successful";
}

$username = $password = $full_name = $company_id = "";

$username = $_POST["username"];
$password = $_POST["password"];
$full_name = $_POST["full_name"];
$company_id = $_POST["company_id"];

if($username == "" || $password == "" || $full_name == "" || $company_id == "") {
    session_start();
    $_SESSION["create_err"] = "please enter all inputs";
    header("Location: createuser.php");
    exit();
}

$sql = 'SELECT COUNT(1) FROM users WHERE username = "' . $username .'"';

$result = mysqli_query($link, $sql);



if($result) {
    $row = mysqli_fetch_assoc($result);
    if (!empty($row)) {
        if ($row["COUNT(1)"] == 0) {
            $sql = 'INSERT INTO users(username, company_id, full_name, password) VALUES ("'.$username.'","'.$company_id.'","'.$full_name.'","'.$password.'")';
            $creation_result = mysqli_query($link,$sql);
            if($creation_result) {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["full_name"] = $full_name;
                $_SESSION["company_id"] = $company_id;
                $_SESSION["is_logged_in"] = true;
                header("Location: index.php");
                exit();
            }
        } else {
            session_start();
            $_SESSION["create_err"] = "This username is already taken";
            header("Location: createuser.php");
            exit();
        }
    }
} else {
    echo "<br>dont work";
}









