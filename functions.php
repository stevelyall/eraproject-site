<?php

require_once("phpPasswordHashingLib/passwordLib.php");
// modifies header for 302 redirect
function redirectTo($page)
{
    header("Location: " . $page);
}

//returns a database connection
function connectToDb()
{
//    production
    $host = "eraprojectca.ipagemysql.com";
    $user = "ernie";
    $pass = "Emotivate_88";
    $dbname = "eraprojectdb";

    // dev
//    $host = "localhost";
//    $user = "root";
//    $pass = "mysql";
//    $dbname = "eradevdb";

    // connect to the database
    $connection = mysqli_connect($host, $user, $pass, $dbname);
    if (mysqli_connect_errno()) {
        die('Could not connect: ' . mysqli_connect_error() . ' error number: ' . mysqli_connect_errno());
    }
    return $connection;
}


// queries the database for all users
function findAllUsers()
{
    $connection = connectToDb();
    $query = "SELECT * FROM user ORDER BY id";
    $users = mysqli_query($connection, $query);
    return $users;
}

// queries the database for the specified username
function findUser($username)
{
    $connection = connectToDb();
    $userid = mysqli_real_escape_string($connection, $username);
    $query = "SELECT * FROM user WHERE username = '{$userid}' LIMIT 1";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        echo "findUserById {$username} failed";
    }
    if ($user = mysqli_fetch_assoc($result)) {
        return $user;
    } else {
        return null;
    }
}

// adds a user to the database
function addUser($username, $password)
{
    $connection = connectToDb();
    $usr = mysqli_real_escape_string($connection, $username);
    $pw = mysqli_real_escape_string($connection, $password);

    // add new user
    $query = "INSERT INTO user (username, password)
                VALUES ('$usr', '$pw'); ";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Adding user failed");
    }
    mysqli_close($connection);
}

// deletes a user from the database
function deleteUser($user)
{
    $connection = connectToDb();
    $username = mysqli_real_escape_string($connection, $user);

    $query = "DELETE FROM user WHERE username = '$username';";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Deleting user failed" . mysqli_error($connection));
    }

    mysqli_close($connection);
}

// replaces a user's information in the database with the new information provided
function modifyUser($user, $newName, $newPass)
{
    $connection = connectToDb();
    $user = mysqli_real_escape_string($connection, $user);
    $newName = mysqli_real_escape_string($connection, $newName);
    $newPass = mysqli_real_escape_string($connection, $newPass);

    $query = "UPDATE user SET username = '$newName', password = '$newPass' WHERE username = '$user' LIMIT 1;";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Updating user failed" . mysqli_error($connection));
    }
    mysqli_close($connection);
}

?>