<?php
ob_start();
require_once("functions.php");

//only accessible if logged in as admin
session_start();
if (!isset($_SESSION['loggedInUser'])) {
    redirectTo("index.php");
} else if ($_SESSION['loggedInUser'] != 'admin') {
    redirectTo("view_responses.php");
}

//delete user
$user= $_GET['user'];

// no access to default user
if ($user == 'admin') {
    redirectTo("index.php");
}

deleteUser($user);
redirectTo("manage_users.php");
ob_flush();
?>