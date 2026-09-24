<?php
declare(strict_types=1);

function database_connection(): mysqli
{
    static $connection = null;

    if ($connection instanceof mysqli) {
        return $connection;
    }

    $config = [
        'host' => getenv('SMS_DB_HOST') ?: '127.0.0.1',
        'port' => (int) (getenv('SMS_DB_PORT') ?: 3307),
        'username' => getenv('SMS_DB_USERNAME') ?: '',
        'password' => getenv('SMS_DB_PASSWORD') ?: '',
        'database' => getenv('SMS_DB_DATABASE') ?: '',
    ];

    $localConfigPath = __DIR__ . '/database.local.php';
    if (is_file($localConfigPath)) {
        $localConfig = require $localConfigPath;
        if (!is_array($localConfig)) {
            throw new RuntimeException('database.local.php must return a configuration array.');
        }
        $config = array_replace($config, $localConfig);
    }

    if ($config['username'] === '' || $config['database'] === '') {
        throw new RuntimeException('Database credentials are not configured.');
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $connection = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['database'],
            $config['port']
        );
    } catch (mysqli_sql_exception $error) {
        error_log('Database connection failed: ' . $error->getMessage());
        throw new RuntimeException(
            'Database connection failed. Make sure the SSH database tunnel is running.'
        );
    }
    $connection->set_charset('utf8mb4');

    $schemaStatements = require __DIR__ . '/database-schema.php';
    foreach ($schemaStatements as $schemaStatement) {
        $connection->query($schemaStatement);
    }

    return $connection;
}

function ensure_user_name_columns(mysqli $connection): void
{
    $userColumns = $connection->query('SHOW COLUMNS FROM users');
    $existingUserColumns = [];
    while ($column = $userColumns->fetch_assoc()) {
        $existingUserColumns[$column['Field']] = true;
    }
    $userColumns->free();

    foreach (['first_name' => 'user_id', 'last_name' => 'first_name'] as $column => $after) {
        if (isset($existingUserColumns[$column])) {
            continue;
        }

        try {
            $connection->query("ALTER TABLE users ADD COLUMN $column VARCHAR(100) NOT NULL DEFAULT '' AFTER $after");
        } catch (mysqli_sql_exception $error) {
            // Another request may have added the same column in the meantime.
            if ($error->getCode() !== 1060) {
                throw $error;
            }
        }
    }
}
