<?php
    // user is logged in
    session_start();
    if (isset($_SESSION['loggedInUser'])) {
        $loggedIn = true;
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
                <li><a href="https://groups.google.com/forum/#!forum/eraprojecttesters">Join the Beta</a></li>

                <?php
                if ($loggedIn) {
                    echo "<li><a href='view_responses.php'> Responses</a></li>";
                    echo "<li><a href='view_participants.php'> Participants</a></li>";
                    echo "<li><a href='manage_users.php'> Manage Users </a></li>";
                }
                ?>
                <li><a href="/privacy_policy.php">Privacy Policy</a></li>
                <li><a href="mailto:myeraproject@gmail.com">Contact</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if ($loggedIn) {
                    echo "<p class='navbar-text'>Signed in as {$_SESSION['loggedInUser']}</p>";
                }
                echo $logInOut ?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>