<ul class="nav nav-tabs">
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php?page=userlist.php">Users</a></li>
    <li role="separator" class="divider"></li>
    <?php
    if (isLoggedIn()) {
        ?>
        <li><a href="index.php?page=logout.php">Logout</a></li>
        <?php
    } else {
        ?>
        <li><a href="index.php?page=login.php">Login</a></li>

        <?php
    }
    ?>
</ul>
