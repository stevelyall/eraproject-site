<?php
/**
 * Deletes the user id passed as a URL parameter from the database.
 */
ob_start();
require_once("functions.php");

//only accessible if logged in as admin
session_start();
if (!isset($_SESSION['loggedInUser'])) {
    redirectTo("index.php");
} else if ($_SESSION['loggedInUser'] != 'admin') {
    redirectTo("view_responses.php");
}

//delete user, unless it is admin
$user = $_GET['user'];
echo $user;
if ($user != 'admin') {
    deleteUser($user);
}
redirectTo("manage_users.php");

ob_flush();
?>