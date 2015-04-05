<?php
    session_start();
    // user is logged in
    if (isset($_SESSION['loggedInUser'])) {
        $logInOut = "<li><a href='/log_out.php'>Log Out</a></li>";
    } else {
        $logInOut = "<li><a href='/login.php'>Researcher Login</a></li>";
    }
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ERA Project</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/index.php">Home</a></li>
                <li><a href="/privacy_policy.php">Privacy Policy</a></li>
                <?php
                // TODO if logged in view results link
                ?>
                <li><a href="https://groups.google.com/forum/#!forum/eraprojecttesters">Join the Beta</a></li>
                <?php echo $logInOut ?>
                <li><a href="http://tru.ca">Thompson Rivers University</a></li>
                <li><a href="mailto:myeraproject@gmail.com">Contact</a></li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>