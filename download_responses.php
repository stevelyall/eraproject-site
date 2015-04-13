<?php
ob_start();
require_once("functions.php");

// viewable only if user is logged in
session_start();
if (!isset($_SESSION['loggedInUser'])) {
    redirectTo("index.php");
}

header('Content-type: text/csv');
header('Content-disposition: attachment;filename=responses.csv');

// open file using stdout
$out = fopen("php://output", "w");

// connect to db
$connection = connectToDb();

//perform query
$result = mysqli_query($connection, "SELECT * FROM response ORDER BY participant_id, response_num");
if (!$result) {
    die("db query failed");
}

// write db query result
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($out, $row);
}
fclose($out);

// release returned data
mysqli_free_result($result);
// close database connection
mysqli_close($connection);
ob_flush();
?>