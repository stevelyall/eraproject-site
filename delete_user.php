<?php
ob_start();
require("functions.php");
$userToDelete = $_GET['user'];
echo "<pre> User $userToDelete </pre>" . var_dump($userToDelete);

deleteUser($userToDelete);
redirectTo("manage_users.php");
ob_flush();
?>