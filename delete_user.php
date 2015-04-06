<?php
ob_start();
require_once("functions.php");

// viewable only if logged in
session_start();
if (!isset($_SESSION['loggedInUser'])) {
    redirectTo("index.php");
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