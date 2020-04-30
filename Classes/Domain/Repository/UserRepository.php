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
     * @var string
     */
    private $tableName = 'insecurity_users';

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
     * Retrieves all Users.
     *
     * @return User[]
     */
    public function findAll()
    {
        $queryResult = $this->databaseService->selectAll($this->tableName);

        return $this->buildMultipleModelsFromRawData($queryResult);
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
        return $this->findOneByWhereClause("id = $id");
    }

    /**
     * Finds the User that matches the given login credentials
     *
     * @param string $email
     * @param string $password
     *
     * @return User|null the matching User of null if there is none
     */
    public function findOneByLoginCredentials($email, $password)
    {
        if ($email == '' || $password == '') {
            return null;
        }

        return $this->findOneByWhereClause("email = \"$email\" AND password = \"$password\"");
    }

    /**
     * Finds one User by the given WHERE clause.
     *
     * @param string $whereClause
     *
     * @return User|null
     */
    private function findOneByWhereClause($whereClause)
    {
        $models = $this->findByWhereClause($whereClause);

        return !empty($models) ? $models[0] : null;
    }

    /**
     * Retrieves the Users matching the given $searchTerm.
     *
     * @return User[]
     */
    public function findBySearchTerm($searchTerm)
    {
        return $this->findByWhereClause("name LIKE \"%$searchTerm%\" OR email LIKE \"%$searchTerm%\"");
    }

    /**
     * Finds the Users by the given WHERE clause.
     *
     * @param string $whereClause
     *
     * @return User[]
     */
    private function findByWhereClause($whereClause)
    {
        $queryResult = $this->databaseService->select($this->tableName, $whereClause);

        return $this->buildMultipleModelsFromRawData($queryResult);
    }

    /**
     * Builds multiple User models from the raw data from the DB.
     *
     * @param mixed[][] $rawData the data for several model
     *
     * @return User[]
     */
    private function buildMultipleModelsFromRawData(array $rawData)
    {
        $models = [];
        foreach ($rawData as $dataRow) {
            $models[] = $this->buildModelFromRawData($dataRow);
        }

        return $models;
    }

    /**
     * Builds a User model from the raw data from the DB.
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
                $typedNewValue = (int)$rawNewValue;
            } elseif (is_bool($previousValue)) {
                $typedNewValue = (bool)$rawNewValue;
            } elseif (is_float($previousValue)) {
                $typedNewValue = (float)$rawNewValue;
            } else {
                $typedNewValue = (string)$rawNewValue;
            }

            $setterName = "set$uppercasedPropertyKey";
            $model->$setterName($typedNewValue);
        }

        return $model;
    }
}
