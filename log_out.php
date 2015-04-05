<?php
ob_start();
require("functions.php");

session_start();
// empty session
$_SESSION = Array();

// remove cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-1000, '/');
}

// destroy session
session_destroy();

redirectTo("index.php");


?>