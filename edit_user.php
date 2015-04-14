<?php
/**
 * Edits a user's name and password.
 */
ob_start();
require_once("functions.php");

//only accessible if logged in as admin
session_start();
if (!isset($_SESSION['loggedInUser'])) {
    redirectTo("index.php");
} else if ($_SESSION['loggedInUser'] != 'admin') {
    redirectTo("view_responses.php");
}

// user to edit
$currentUsername = $_GET['user'];
// no access to default user
if ($currentUsername == 'admin') {
    redirectTo("index.php");
}

if (isset($_POST['submit'])) {
    // form was submitted
    $currentUsername = $_POST['user'];
    $newusername = $_POST['inputUsername'];
    $newpassword = $_POST['inputPassword'];
    modifyUser($currentUsername, $newusername, $newpassword);
    $msg = "User {$newusername} modified.";
} else {
    // form was not submitted (GET request)
    $msg = "Edit User " . $currentUsername;
}
ob_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERA | Edit User <?php echo $currentUsername ?></title>

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
        <form class="form-signin" action="edit_user.php" method="post">
            <h2 class="form-signin-heading"> <?php echo $msg; ?> </h2>
            <!-- also post current user name for new page to access -->
            <input type="hidden" name="user" value="<?php echo $currentUsername; ?>">
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" name="inputUsername" class="form-control" placeholder="New Username" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="inputPassword" class="form-control" placeholder="New Password" required>
            <br>
            <button class="btn btn-primary" type="submit" name="submit">Submit Changes</button>
        </form>
        <br>
        <a href='manage_users.php'><button class="btn btn-primary">Done Editing User</button></a>
    </content>

</div>
<!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>