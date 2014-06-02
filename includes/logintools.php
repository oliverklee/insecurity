<?php
/**
 * @return void
 */
function startSession() {
	static $sessionsHasBeenStarted = false;
	if (!$sessionsHasBeenStarted) {
		session_start();
		$sessionsHasBeenStarted = true;
	}
}

/**
 * @return int
 */
function getUserIdForLoginData() {
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
	$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
	if ($email == '' || $password == '') {
		return 0;
	}

	$where = 'WHERE email = "' . $email . '" AND password = "' . $password . '"';
	$databaseConnection = getDatabaseConnection();
	$result = $databaseConnection->query('SELECT * FROM insecurity_users ' . $where);
	if ($result->num_rows > 0) {
		$userData = $result->fetch_assoc();
		$userId = $userData['id'];
	} else {
		$userId = 0;
	}

	return $userId;
}