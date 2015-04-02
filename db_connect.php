<?php
function connectToDb()
{
    // connect to the database
    $connection = mysqli_connect('eraprojectca.ipagemysql.com', 'ernie', 'Emotivate_88', 'eraprojectdb');
    if (mysqli_connect_errno()) {
        die('Could not connect: ' . mysqli_connect_error() . ' error number: ' . mysqli_connect_errno());
    }
    return $connection;
}

?>