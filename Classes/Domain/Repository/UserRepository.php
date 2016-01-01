<?php
namespace OliverKlee\Insecurity\Domain\Repository;

use OliverKlee\Insecurity\Domain\Model\User;
use OliverKlee\Insecurity\Service\DatabaseService;

/**
 * This class is a repository for User models.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class UserRepository
{
    /**
     * @var UserRepository
     */
    private static $instance = null;

    /**
     * @var DatabaseService
     */
    private $databaseService = null;

    /**
     * Private constructor (as this class is a Singleton).
     */
    private function __construct()
    {
        $this->databaseService = DatabaseService::getInstance();
    }

    /**
     * Returns the Singleton instance of this class. Use this method instead of calling new.
     *
     * @return UserRepository
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Purges the Singleton instance.
     *
     * @return void
     */
    public static function purgeInstance()
    {
        self::$instance = null;
    }

    /**
     * Finds one User by ID.
     *
     * @param int $id
     *
     * @return User|null will be null if there is no user with that ID
     */
    public function findOneById($id)
    {
        $where = "id = $id";
        $queryResult = $this->databaseService->select('insecurity_users', $where);
        if (empty($queryResult)) {
            return null;
        }
        $userData = $queryResult[0];

        return $this->buildModelFromRawData($userData);
    }

    /**
     * Builds a User model rom the raw data from the DB.
     *
     * @param mixed[] $rawData the data for one model
     *
     * @return User
     */
    private function buildModelFromRawData(array $rawData)
    {
        $model = new User();
        foreach ($rawData as $key => $rawNewValue) {
            $uppercasedPropertyKey = ucfirst($key);
            $getterName = "get$uppercasedPropertyKey";
            if (!method_exists($model, $getterName)) {
                continue;
            }

            $previousValue = $model->$getterName();
            if (is_int($previousValue)) {
                $typedNewValue = (int) $rawNewValue;
            } elseif (is_bool($previousValue)) {
                $typedNewValue = (bool) $rawNewValue;
            } elseif (is_float($previousValue)) {
                $typedNewValue = (float) $rawNewValue;
            } else {
                $typedNewValue = (string) $rawNewValue;
            }

            $setterName = "set$uppercasedPropertyKey";
            $model->$setterName($typedNewValue);
        }

        return $model;
    }
}
