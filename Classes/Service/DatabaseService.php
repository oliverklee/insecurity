<?php

namespace OliverKlee\Insecurity\Service;

/**
 * This service is a nice wrapper for Database access.
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class DatabaseService
{
    /**
     * @var string
     */
    private const CONFIGURATION_PATH = 'Configuration/db.json';

    /**
     * @var DatabaseService
     */
    private static $instance = null;

    /**
     * @var \mysqli
     */
    private $connection = null;

    /**
     * Private constructor (as this class is a Singleton).
     */
    private function __construct()
    {
    }

    /**
     * Returns the Singleton instance of this class. Use this method instead of calling new.
     *
     * @return DatabaseService
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
     * Connects to the database.
     *
     * If there already is a connection, this method is a no-op. So it's save to call multiple times.
     *
     * @return void
     *
     * @throws \UnexpectedValueException
     */
    public function connect()
    {
        if ($this->isConnected()) {
            return;
        }

        $configuration = $this->retrieveConfiguration();
        $this->connection = new \mysqli(
            $configuration['host'],
            $configuration['username'],
            $configuration['password'],
            $configuration['name']
        );
    }

    /**
     * Closes the database connection (if there is any).
     *
     * @return void
     */
    public function disconnect()
    {
        if (!$this->isConnected()) {
            return;
        }

        $this->connection->close();
        $this->connection = null;
    }

    /**
     * Checks whether a connection to the database already has been established.
     *
     * @return bool
     */
    public function isConnected()
    {
        return $this->connection !== null;
    }

    /**
     * Reads and returns the configuration form the JSON configuration file.
     *
     * @return string[]
     *
     * @throws \UnexpectedValueException
     */
    private function retrieveConfiguration()
    {
        $absoluteConfigurationPath = $this->getApplicationRoot() . self::CONFIGURATION_PATH;
        $configurationAsJson = file_get_contents($absoluteConfigurationPath);
        if ($configurationAsJson === false) {
            throw new \UnexpectedValueException(
                'Configuration file could not be read: ' . $absoluteConfigurationPath,
                1450711920
            );
        }

        return json_decode($configurationAsJson, true);
    }

    /**
     * Retrieves the absolute path to the application root.
     *
     * @return string the absolute path to the application root (including the trailing slash)
     */
    private function getApplicationRoot()
    {
        return dirname(__DIR__) . '/../';
    }

    /**
     * Executes a SELECT query.
     *
     * @param string $table the name of the table to query, must not be empty
     * @param string $where the WHERE clause (without the "WHERE" and without the trailing semicolon)
     *
     * @return mixed[][]
     *
     * @throws \RuntimeException
     */
    public function select($table, $where)
    {
        return $this->executeQuery("SELECT * FROM $table WHERE $where;");
    }

    /**
     * Executes a SELECT query for all records in a table.
     *
     * @param string $table the name of the table to query, must not be empty
     *
     * @return mixed[][]
     *
     * @throws \RuntimeException
     */
    public function selectAll($table)
    {
        return $this->executeQuery("SELECT * FROM $table");
    }

    /**
     * Executes a query.
     *
     * @param string $queryString the complete query string
     *
     * @return mixed[][]
     *
     * @throws \RuntimeException
     */
    private function executeQuery($queryString)
    {
        $queryResult = $this->connection->query($queryString);
        if ($queryResult === false) {
            throw new \RuntimeException("SELECT \"$queryString\" failed: ", 1451829441);
        }

        $resultRows = $queryResult->fetch_all(MYSQLI_ASSOC);
        $queryResult->free();

        return $resultRows;
    }
}
