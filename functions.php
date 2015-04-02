<?php

function connectToDb()
{
    // connect to the database
    $connection = mysqli_connect('eraprojectca.ipagemysql.com', 'ernie', 'Emotivate_88', 'eraprojectdb');
    //$connection = mysqli_connect('imacelery.ddns.net', 'dbbox', 'craptop', 'test');
    if (mysqli_connect_errno()) {
        die('Could not connect: ' . mysqli_connect_error() . ' error number: ' . mysqli_connect_errno());
    }
    echo "connected";
    return $connection;
}

//
//function findAllUsers() {
//    $connection = connectToDb();
//    $query = "SELECT * FROM users ORDER BY username";
//    $users = mysqli_query($connection, $query);
//    return $users;
//}
//
//function findUserById($username) {
//    $connection = connectToDb();
//
//    $userid = mysqli_real_escape_string($connection, $username);
//
//    $query = "SELECT * FROM users WHERE username = {$userid} LIMIT 1";
//
//    $result = mysqli_query($connection, $query);
//
//    if ($user = mysqli_fetch_assoc($result)) {
//        return $user;
//    } else {
//        return null;
//    }
//}

?>