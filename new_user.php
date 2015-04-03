<?php
require("functions.php");
if (isset($_POST['submit'])) {
    // form was submitted
    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];

    $connection = connectToDb();
    $usr = mysqli_real_escape_string($connection, $username);
    $pw = mysqli_real_escape_string($connection, $password);

    // check for duplicate user
    $query = "SELECT * FROM users WHERE username = '$usr';";
    $result = mysqli_query($connection, $query);
    echo "<pre>";
    var_dump($query);
    var_dump($result);;
    echo "</pre>";

    if (!$result) {
        echo "check for duplicate user query failed";
    }

    mysqli_free_result($result);

    // user with that name exists
    if (mysqli_num_rows($result) > 0) {
        $msg = "Can't add user {$username}, the user already exists.";
    } else {
        // add new user
        $query = "INSERT INTO users (username, hashed_password)
                VALUES ('$usr', '$pw'); ";
        $result = mysqli_query($connection, $query);
        mysqli_free_result($result);
        mysqli_close($connection);

        if (!$result) {
            die("Adding user failed");
        }

        $msg = "User {$username} added.";


    }
} else {
    // form was not submitted (GET request)
    $msg = "Add User";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERA | New User</title>

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
    include("navigation.php")
    ?>

    <content>
        <!-- add user form -->
        <form class="form-signin" action="new_user.php" method="post">
            <h2 class="form-signin-heading"> <?php echo $msg; ?> </h2>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Add User</button>
        </form>

    </content>

</div>
<!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>