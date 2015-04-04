<?php
require("functions.php");

if (isset($_POST['submit'])) {
    // form was submitted
    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];


    // check for duplicate user
    // user with that name exists
    if (findUserById($username) != null) {
        $msg = "Can't add user {$username}, the user already exists.";
    } else {
        // add user
        addUser($username, $password);
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