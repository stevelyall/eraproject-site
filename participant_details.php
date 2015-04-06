<?php
ob_start();
require_once("functions.php");

// viewable only if logged in
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
    <title>ERA | Participant Details</title>

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
        <?php
        $connection = connectToDb();

        $id = $_GET['participant'];
        //perform query
        $query = "SELECT * FROM participant WHERE participant_id = '$id'";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("db query failed");
        }

        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container-fluid">
            <p>
                Participant details for participant:
                <strong>
                    <?php
                    echo $row['participant_id'];
                    ?>
                </strong>
            </p>

            <p>
                Age:
                <strong>
                    <?php
                    echo $row['age'];
                    ?>
                </strong>
            </p>

            <p>
                Gender:
                <strong>
                    <?php
                    echo $row['gender'];
                    ?>
                </strong>
            </p>

            <p>
                Ethnicity:
                <strong>
                    <?php
                    echo $row['ethnicity'];
                    ?>
                </strong>

            </p>

            <p>
                Number of responses:
                <strong>
                    <?php
                    echo $row['num_responses'];
                    ?>
                </strong>

            </p>

            <?php
            // release returned data
            mysqli_free_result($result);
            // close database connection
            mysqli_close($connection);
            ?>

            <a class="btn btn-primary" href="javascript:history.go(-1)" role="button">Back</a>
        </div>

    </content>

</div>
<!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>