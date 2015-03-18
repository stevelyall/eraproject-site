$server = "eraprojectca.ipagemysql.com";
$username = "steve";
$password = "Password1";
$database = "eraprojectdbtest";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());

mysql_select_db($database, $con);


$comment = mysql_escape_string($_POST["comment"]);

$sql = "INSERT INTO testtable (comment) VALUES (wasssssssup) ";

if (!mysql_query($sql, $con)) {
    die('Error: ' . mysql_error());
} else {
    echo "test added";
}

mysql_close($con);