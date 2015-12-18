<?php
/**
 */
function startSession()
{
    static $sessionsHasBeenStarted = false;
    if (!$sessionsHasBeenStarted) {
        session_start();
        $sessionsHasBeenStarted = true;
    }
}

/**
 * @return bool
 */
function isLoggedIn()
{
    return isset($_SESSION['logged_in']);
}

/**
 */
function checkLoginLogout()
{
    startSession();
    if (!isLoggedIn()) {
        $userId = getUserIdForLoginData();
        if ($userId > 0) {
            logInUser($userId);
        }
    }
}

/**
 * @param int $id
 */
function logInUser($id)
{
    $_SESSION['logged_in'] = true;
    setcookie('user_id', $id);
    $_COOKIE['user_id'] = $id;
}

/**
 */
function logOutUser()
{
    unset($_SESSION['logged_in']);
    setcookie('user_id', null);
}

/**
 * @return int
 */
function getUserIdForLoginData()
{
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';
    if ($email == '' || $password == '') {
        return 0;
    }

    $where = 'WHERE email = "'.$email.'" AND password = "'.$password.'"';
    $databaseConnection = getDatabaseConnection();
    $result = $databaseConnection->query('SELECT * FROM insecurity_users '.$where);
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        $userId = $userData['id'];
    } else {
        $userId = 0;
    }

    return $userId;
}

/**
 * @param int $id
 *
 * @return array
 */
function getUserDataForId($id)
{
    $where = 'WHERE id = '.$id;
    $databaseConnection = getDatabaseConnection();
    $result = $databaseConnection->query('SELECT * FROM insecurity_users '.$where);
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        $userData = array();
    }

    return $userData;
}
