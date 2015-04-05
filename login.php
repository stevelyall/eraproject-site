<?php
ob_start();
require("functions.php");

// form was submitted
if (isset($_POST['submit'])) {

    $username = $_POST['inputUsername'];
    $password = $_POST['inputPassword'];
    // TODO VALDATIONS

    // find user in db
    $found_user = findUser($username);
    //echo "<pre> $username <br> $found_user <br> var_dump($found_user)</pre>";
    if ($found_user != null) {
        // password matches
        $logged_in = ($found_user['password'] == $password) ? true : false;
        if ($logged_in) {
            session_start();
            $_SESSION['loggedInUser'] = $found_user['username'];
            redirectTo("view_results.php");
        }
        else {
//            echo "incorrect pass";
            $msg = "Incorrect Username/Password";
        }
    }
    //no user or incorrect password
    else {
//        echo "incorrect user";
        $msg = "Incorrect Username/Password";
    }
}
// form was not submitted (GET request)
else {
    $msg = "Please Log In";
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
    include("navigation.php")
    ?>

   <content>

       <!-- login form -->

       <form class="form-signin" action="login.php" method="post">
           <h2 class="form-signin-heading"> <?php echo $msg ?> </h2>
           <label for="inputUsername" class="sr-only">Username</label>
           <input type="text" name="inputUsername" class="form-control" placeholder="Username" value="<?php if (isset($username)) echo htmlentities($username)?>" required autofocus>
           <label for="inputPassword" class="sr-only">Password</label>
           <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
           <br>
           <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
       </form>

   </content>

</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>