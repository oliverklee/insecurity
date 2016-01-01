<div class="jumbotron">
    <div class="container" style="width: 30em;">

        <?php
        if (isLoggedIn()) {
            $user = getLoggedInUser();
            $userEmail = $user->getEmail();
            ?>
            <p>You are now logged in as <strong><?= $userEmail ?></strong>.</p>
            <?php
        } else {
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
            $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
            ?>
            <form class="form-signin" role="form" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                <h2 class="form-signin-heading">Please sign in</h2>
                <input type="email" class="form-control" name="email" placeholder="Email address" value="<?= $email ?>" required
                       autofocus>
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?= $password ?>"
                       required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>

            <?php
        }
        ?>
    </div>
</div>
