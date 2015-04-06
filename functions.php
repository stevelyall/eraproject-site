<?php

function redirectTo($page)
{
    header("Location: " . $page);
}

function connectToDb()
{
//    production
    $host = "eraprojectca.ipagemysql.com";
    $user = "ernie";
    $pass = "Emotivate_88";
    $dbname = "eraprojectdb";

////    // dev
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


function findAllUsers()
{
    $connection = connectToDb();
    $query = "SELECT * FROM user ORDER BY id";
    $users = mysqli_query($connection, $query);
    return $users;
}

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

function modifyUser($user, $newName, $newPass)
{
    var_dump($user);
    $connection = connectToDb();
    $user = mysqli_real_escape_string($connection, $user);
    $newName = mysqli_real_escape_string($connection, $newName);
    $newPass = mysqli_real_escape_string($connection, $newPass);

    echo "<pre>";
    var_dump($user);
    var_dump($newName);
    var_dump($newPass);
    echo "</pre>";

    $query = "UPDATE user SET username = '$newName', password = '$newPass' WHERE username = '$user';";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Updating user failed" . mysqli_error($connection));
    }

    mysqli_close($connection);
}

?>