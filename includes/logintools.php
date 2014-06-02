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
 * @return bool
 */
function isLoggedIn() {
	return isset($_SESSION['logged_in_user']);
}

/**
 * @param int $id
 *
 * @return void
 */
function logInUser($id) {
	$_SESSION['logged_in_user'] = $id;
}

/**
 * @return void
 */
function logOutUser() {
	unset($_SESSION['logged_in_user']);
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

/**
 * @param integer $id
 *
 * @return array
 */
function getUserDataForId($id) {
	$where = 'WHERE id = ' . $id;
	$databaseConnection = getDatabaseConnection();
	$result = $databaseConnection->query('SELECT * FROM insecurity_users ' . $where);
	if ($result->num_rows > 0) {
		$userData = $result->fetch_assoc();
	} else {
		$userData = array();
	}

	return $userData;
}