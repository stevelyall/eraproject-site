<?php

function connectToDb()
{
    //production
//    $host = "eraprojectca.ipagemysql.com";
//    $user = "ernie";
//    $pass = "Emotivate_88";
//    $dbname = "eraprojectdb";

    // dev
    $host = "localhost";
    $user = "root";
    $pass = "mysql";
    $dbname = "eradevdb";

    // connect to the database
    $connection = mysqli_connect($host, $user, $pass, $dbname);
    if (mysqli_connect_errno()) {
        die('Could not connect: ' . mysqli_connect_error() . ' error number: ' . mysqli_connect_errno());
    }
    return $connection;
}


function findAllUsers()
{
    $connection = connectToDb();
    $query = "SELECT * FROM users ORDER BY id";
    $users = mysqli_query($connection, $query);
    return $users;
}

function findUserById($username)
{
    $connection = connectToDb();

    $userid = mysqli_real_escape_string($connection, $username);

    $query = "SELECT * FROM users WHERE username = {$userid} LIMIT 1";

    $result = mysqli_query($connection, $query);

    if ($user = mysqli_fetch_assoc($result)) {
        return $user;
    } else {
        return null;
    }
}

?>