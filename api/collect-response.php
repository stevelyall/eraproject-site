<?php
// TODO hide db connection details
$con = mysql_connect('eraprojectca.ipagemysql.com', 'steve', 'Password1');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_select_db(eraprojectdbtest);
echo "<br>";
$json = file_get_contents('php://input');

echo "JSON:";
var_dump($json);
echo "<br>";
$obj = json_decode($json);
echo "decoded:";
echo $obj->{test};
$toInsert = mysql_real_escape_string($obj->{test});

$sql = "INSERT INTO testtable (comments) VALUES ('$toInsert');";

if (!mysql_query($sql, $con)) {
    die('Error: ' . mysql_error());
} else {
    echo "<br>test added";
}

mysql_close($con);

?>