<?php
/**
 * @return mysqli
 *
 * @throws InvalidArgumentException
 */
function getDatabaseConnection()
{
    static $isConnected = false;
    static $connection = null;
    if (!$isConnected) {
        $configurationAsJson = file_get_contents('configuration/db.json');
        if (!$configurationAsJson) {
            throw new \InvalidArgumentException('Configuration file could not be read.');
        }
        $configuration = json_decode($configurationAsJson, true);
        $connection = new mysqli($configuration['host'], $configuration['username'], $configuration['password'],
            $configuration['name']);
    }

    return $connection;
}
