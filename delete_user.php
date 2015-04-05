<?php
ob_start();
require_once("functions.php");

// viewable only if logged in
session_start();
if (!isset($_SESSION['loggedInUser'])) {
    redirectTo("index.php");
}

//delete user
$userToDelete = $_GET['user'];
echo "<pre> User $userToDelete </pre>" . var_dump($userToDelete);

deleteUser($userToDelete);
redirectTo("manage_users.php");
ob_flush();
?>