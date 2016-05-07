<?php

/**
 * Initializes the login/logout process and logs users in or out if requested.
 *
 * @return void
 */
function checkLoginLogout()
{
    startSession();

    processLogoutIfProvided();
    processNewLoginIfProvided();
    processExistingLogin();
}

/**
 * Starts the session (if it has not been started already).
 *
 * @return void
 */
function startSession()
{
    /** @var bool $sessionHasBeenStarted */
    static $sessionHasBeenStarted = false;
    if (!$sessionHasBeenStarted) {
        session_start();
        $sessionHasBeenStarted = true;
        $GLOBALS['logged_in'] = false;
    }
}

/**
 * Processes a new login request (if there is one).
 *
 * @return void
 */
function processNewLoginIfProvided()
{
    if (!isset($_REQUEST['email']) || !isset($_REQUEST['password'])) {
        return;
    }

    $userRepository = \OliverKlee\Insecurity\Domain\Repository\UserRepository::getInstance();
    $user = $userRepository->findOneByLoginCredentials($_REQUEST['email'], $_REQUEST['password']);
    if ($user !== null) {
        loginUser($user);
    }
}

/**
 * Logs in $user.
 *
 * @param \OliverKlee\Insecurity\Domain\Model\User $user
 *
 * @return void
 */
function logInUser($user)
{
    $_SESSION['logged_in'] = true;
    $GLOBALS['logged_in'] = true;
    setcookie('user_id', $user->getId());
    $_COOKIE['user_id'] = $user->getId();
}

/**
 * Checks whether a login already is in the session and then marks the user as logged in.
 *
 * @return void
 */
function processExistingLogin()
{
    $GLOBALS['logged_in'] = isset($_SESSION['logged_in']) ? (bool)$_SESSION['logged_in'] : false;
}

/**
 * Checks whether a user is logged in.
 *
 * @return bool
 */
function isLoggedIn()
{
    return $GLOBALS['logged_in'];
}

/**
 * Logs the user out if the page is "logout.php".
 *
 * @return void
 */
function processLogoutIfProvided()
{
    if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'logout.php') {
        logOutUser();
    }
}

/**
 * Logs out any user.
 *
 * @return void
 */
function logOutUser()
{
    unset($_SESSION['logged_in']);
    $GLOBALS['logged_in'] = false;
    setcookie('user_id', null);
}

/**
 * Gets the logged-in user (or null if no user is logged in).
 *
 * @return \OliverKlee\Insecurity\Domain\Model\User|null
 */
function getLoggedInUser()
{
    if (!isLoggedIn()) {
        return null;
    }

    $userRepository = \OliverKlee\Insecurity\Domain\Repository\UserRepository::getInstance();
    $userId = $_COOKIE['user_id'];

    return $userRepository->findOneById($userId);
}
