<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="navbar-collapse collapse">
        <form class="navbar-form navbar-right" role="form" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <input name="search_term" type="text" placeholder="Search term" class="form-control"
                       value="<?= isset($_REQUEST['search_term']) ? $_REQUEST['search_term'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Full name
                </th>
                <th>
                    E-mail address
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $userRepository = \OliverKlee\Insecurity\Domain\Repository\UserRepository::getInstance();

            if (isset($_REQUEST['search_term']) && ($_REQUEST['search_term'] != '')) {
                $users = $userRepository->findBySearchTerm($_REQUEST['search_term']);
            } else {
                $users = $userRepository->findAll();
            }

            /** @var $user string[] */
            foreach ($users as $user) {
                ?>
                <tr>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getEmail() ?></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>