<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?page=userlist.php">Users</a></li>
            </ul>
            <?php
            if (isLoggedIn()) {
                $user = getLoggedInUser();
                $userEmail = $user->getEmail();
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php?page=logout.php">Logout</a>
                    </li>
                </ul>
                <p class="nav navbar-text navbar-right">
                    Logged in as <b><?= $userEmail ?></b>
                </p>
                <?php
            } else {
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php?page=login.php">Login</a>
                    </li>
                </ul>
                <?php
            }
            ?>
        </div>
    </div>
</nav>
