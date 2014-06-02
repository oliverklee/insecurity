<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Insecurity</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<nav>
<?php
require_once 'includes/db.php';
require_once 'includes/logintools.php';
checkLoginLogout();
require_once 'includes/navigation.php'
?>
			</nav>
		</header>

		<main>
<?php

$pageToInclude = 'includes/' .  (!empty($_GET['page']) ? $_GET['page'] : 'home.php');
if (!is_file($pageToInclude)) {
	throw new \InvalidArgumentException('Page not found:' . $pageToInclude);
}
require_once $pageToInclude;
?>
		</main>

		<footer>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
		</footer>
	</body>
</html>