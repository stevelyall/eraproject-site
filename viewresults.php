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
    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ERA Project</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">

<!--                TODO what does nav bar look like-->
                <ul class="nav navbar-nav">
                    <li><a href="/index.html">Home</a></li>
                    <li><a href="/privacyPolicy.html">Privacy Policy</a></li>
                    <li><a href="https://groups.google.com/forum/#!forum/eraprojecttesters">Join the Beta</a> </li>
<!--                    <li><a href="/login.php">Researcher Login</a> </li>-->

                    <li><a href="http://tru.ca">Thompson Rivers University</a></li>
                    <li><a href="mailto:myeraproject@gmail.com">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <content>
        <div class="container-fluid">
            <?php
                // connect to the database
                $connection = mysqli_connect('eraprojectca.ipagemysql.com', 'ernie', 'Emotivate_88', 'eraprojectdb');
                if (mysqli_connect_errno()) {
                    die('Could not connect: ' . mysqli_connect_error() . mysqli_connect_errno());
                }
                echo 'Connected successfully <br><br>';
            ?>


            <?php
            //perform query
             $query = "SELECT * FROM response";
             $result = mysqli_query($connection, $query);

            if (!$result) {
                die("db query failed");
            }

            ?>


            <?php
            // use returned data
            echo "<table>";
                while ($row = mysqli_fetch_assoc($result)) {
                    // output each row
                    var_dump($row);
                    echo "<hr>";
                }
            echo "</table>";
            ?>

            // release returned data
            <?php
            mysqli_free_result($result);
            ?>

            // close database connection
            mysqli_close($connection);
            ?>

            <table>

            </table>
        </div>
    </content>

</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>