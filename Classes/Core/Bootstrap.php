<?php

namespace OliverKlee\Insecurity\Core;

use OliverKlee\Insecurity\Domain\Repository\UserRepository;
use OliverKlee\Insecurity\Service\DatabaseService;

/**
 * This class bootstraps the application and shuts it down again.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
final class Bootstrap
{
    /**
     * Private constructor.
     *
     * This should only be used via its static methods.
     */
    private function __construct()
    {
    }

    /**
     * Bootstraps the system.
     *
     * @return void
     *
     * @throws \UnexpectedValueException
     */
    public static function bootstrap()
    {
        self::includeAutoloader();
        self::connectToDatabase();
    }

    /**
     * Shuts down the system.
     *
     * @return void
     */
    public static function shutDown()
    {
        UserRepository::purgeInstance();
        DatabaseService::getInstance()->disconnect();
        DatabaseService::purgeInstance();
    }

    /**
     * Includes the autoloader.
     *
     * @return void
     */
    private static function includeAutoloader()
    {
        require_once __DIR__ . '/../../vendor/autoload.php';
    }

    /**
     * Connects to the database.
     *
     * @return void
     *
     * @throws \UnexpectedValueException
     */
    private static function connectToDatabase()
    {
        DatabaseService::getInstance()->connect();
    }
}
