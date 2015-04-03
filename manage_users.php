<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERA | Manage Users</title>

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
            <?php
            require("functions.php");
            $connection = connectToDb();

            //perform query
            $query = "SELECT * FROM users ORDER BY id";
            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("db query failed");
            }
            ?>

            <table class='table-striped table-hover'>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Options</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    // output each row
                    echo "<tr>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["hashed_password"] . "</td>";
                    echo "<td>
                            <a href='delete_user.php?user={$row["username"]}'> <span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>

                        </td>";
                }
                ?>
            </table>
            <?php
            // release returned data
            mysqli_free_result($result);
            // close database connection
            mysqli_close($connection);
            ?>
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