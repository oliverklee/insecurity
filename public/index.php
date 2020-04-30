<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insecurity</title>
    <link href="css/bootstrap.min.css?201512261312" rel="stylesheet">
</head>
<body>
<header>
    <?php
    require_once '../Classes/Core/Bootstrap.php';
    \OliverKlee\Insecurity\Core\Bootstrap::bootstrap();
    require_once '../vendor/autoload.php';
    require_once '../includes/logintools.php';
    checkLoginLogout();
    require_once '../includes/navigation.php'
    ?>
</header>

<main>
    <?php
    $pageToInclude = '../includes/' . (!empty($_GET['page']) ? $_GET['page'] : 'home.php');
    if (!is_file($pageToInclude)) {
        throw new \InvalidArgumentException('Page not found:' . $pageToInclude);
    }
    require_once $pageToInclude;
    ?>
</main>

<footer>
    <script src="js/jquery-3.5.0.min.js?202004301152"></script>
    <script src="js/bootstrap.min.js?201512261312"></script>
</footer>
</body>
</html>
<?php
\OliverKlee\Insecurity\Core\Bootstrap::shutDown();
