#!/usr/bin/env bash

SCRIPT_PATH="/var/www/db";

echo "Setting up database...";
mysql --user=root --password=root < "${SCRIPT_PATH}/database.sql";

echo "Setting up users...";
mysql --user=root --password=root --database=insecurity < "${SCRIPT_PATH}/users.sql";

echo "Done!";