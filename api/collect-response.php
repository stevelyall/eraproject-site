<?php
$con = mysql_connect('eraprojectca.ipagemysql.com', 'steve', 'Password1');
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_select_db(eraprojectdbtest);


$comment = mysql_real_escape_string($_POST["comment"]);

$sql = "INSERT INTO testtable (comments) VALUES ('wasssssssup') ";

if (!mysql_query($sql, $con)) {
    die('Error: ' . mysql_error());
} else {
    echo "test added";
}

mysql_close($con);

?>