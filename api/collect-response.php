<?php

/**
 * Handles participant data sent via POST from mobile application and inserts it into the database.
 */


// connect to the database
$host = "eraprojectca.ipagemysql.com";
$user = "ernie";
$pass = "Emotivate_88";
$dbname = "eraprojectdb";
$connection = mysqli_connect($host, $user, $pass, $dbname);
if (mysqli_connect_errno()) {
    die('Could not connect: ' . mysqli_connect_error() . ' error number: ' . mysqli_connect_errno());
}

// get JSON object
$json = file_get_contents('php://input');
var_dump($json);
echo '<br>';
$obj = json_decode($json);

// get and escape strings

// participant data
$participant_id = mysql_real_escape_string($obj->{participantId});
$age = mysql_real_escape_string($obj->{age});
$gender = mysql_real_escape_string($obj->{gender});
$ethnicity = mysql_real_escape_string($obj->{ethnicity});

// response data
$response_num = mysql_real_escape_string($obj->{responseNum});
$start_time = mysql_real_escape_string($obj->{startTime});
$end_time = mysql_real_escape_string($obj->{endTime});
$start_time = mysql_real_escape_string($obj->{startTime});
$location = mysql_real_escape_string($obj->{location});
$q1_response = mysql_real_escape_string($obj->{q1response});
$q2_response = mysql_real_escape_string($obj->{q2response});
$q3_response = mysql_real_escape_string($obj->{q3response});
$q4_response = mysql_real_escape_string($obj->{q4response});
$q5_response = mysql_real_escape_string($obj->{q5response});
$q6_response = mysql_real_escape_string($obj->{q6response});
$q7_response = mysql_real_escape_string($obj->{q7response});
$q8_response = mysql_real_escape_string($obj->{q8response});
$q9_response = mysql_real_escape_string($obj->{q9response});
$q10_response = mysql_real_escape_string($obj->{q10response});
$q11_response = mysql_real_escape_string($obj->{q11response});
$q12_response = mysql_real_escape_string($obj->{q12response});
$q13_response = mysql_real_escape_string($obj->{q13response});
$q14_response = mysql_real_escape_string($obj->{q14response});
$q15_response = mysql_real_escape_string($obj->{q15response});
$q16_response = mysql_real_escape_string($obj->{q16response});
$q17_response = mysql_real_escape_string($obj->{q17response});
$q18_response = mysql_real_escape_string($obj->{q18response});

// if participant does not exist in participants table, insert
$insertParticipantQuery = "INSERT IGNORE INTO participant (participant_id, age, gender, ethnicity)
                           VALUES ('$participant_id', '$age', '$gender', '$ethnicity');";

// insert the responses in the response table
$insertResponseQuery = "INSERT INTO response (participant_id, response_num, start_time, end_time, location, q1_response, q2_response, q3_response, q4_response, q5_response, q6_response, q7_response, q8_response, q9_response, q10_response, q11_response, q12_response, q13_response, q14_response, q15_response, q16_response, q17_response, q18_response)
                        VALUES ('$participant_id', '$response_num', '$start_time', '$end_time', '$location', '$q1_response', '$q2_response', '$q3_response', '$q4_response', '$q5_response', '$q6_response', '$q7_response', '$q8_response', '$q9_response', '$q10_response', '$q11_response', '$q12_response', '$q13_response', '$q14_response', '$q15_response', '$q16_response', '$q17_response', '$q18_response');";

// update the participant's response count in the database instead of using a trigger. Thanks, iPage.
$responseCountQuery =
"UPDATE participant SET num_responses =
    ( SELECT COUNT(*)
	   FROM response
       WHERE participant_id = '$participant_id'
       GROUP BY participant_id
	) WHERE participant_id = '$participant_id';";


function runQuery($Query, $con) {
    if (!mysqli_query($Query, $con)) {
        die('Error: ' . mysql_error());
    } else {
        echo "<br> insert success" . mysql_info();
    }
}

// run INSERT statements
runQuery($insertParticipantQuery, $connection);
runQuery($insertResponseQuery, $connection);
runQuery($responseCountQuery, $connection);


mysqli_close($connection);

?>