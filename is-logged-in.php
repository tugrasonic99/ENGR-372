<?php
session_start();

// Check if user is logged in, if not redirect to the login page
if(!empty($_SESSION["is_logged_in"])) {
    header("Location: index.php");
}