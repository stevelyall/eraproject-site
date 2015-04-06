<?php
    ob_start();
    require_once("functions.php");

    // viewable only if user is logged in
    session_start();
    if (!isset($_SESSION['loggedInUser'])) {
        redirectTo("index.php");
    }
    ob_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERA | Home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <?php
    require("navigation.php");
    ?>

    <content>
        <div class="container-fluid">
            <h2>Responses</h2>
            <br>
            <?php
            $connection = connectToDb();

            //perform query
             $query = "SELECT * FROM response ORDER BY participant_id, response_num";
             $result = mysqli_query($connection, $query);

            if (!$result) {
                die("db query failed");
            }
            ?>

            <table class='table-striped table-hover'>
                <tr>
                    <th>Participant ID</th>
                    <th>Response Number</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Location</th>

                    <?php
                    for ($i = 1; $i < 19; $i++) {
                        echo "<th>Q$i</th>";

                    }
                    ?>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    // output each row
                    echo "<tr>";
                    echo "<td>" . "<a href='participant_details.php?participant=" . $row["participant_id"] . "'>" . $row["participant_id"] . "</td>";
                    echo "<td>" . $row["response_num"] . "</td>";
                    echo "<td>" . $row["start_time"] . "</td>";
                    echo "<td>" . $row["end_time"] . "</td>";
                    echo "<td>" . $row["location"] . "</td>";
                    for ($i = 1; $i<19; $i++) {
                        echo "<td>" . $row["q" . $i . "_response"] . "</td>";
                    }
                    echo "</tr>";
                }
            echo "</table>";
            ?>

            <?php
            // release returned data
            mysqli_free_result($result);
            // close database connection
            mysqli_close($connection);
            ?>
        </div>
    </content>

</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>