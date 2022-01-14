<?php

namespace App\Services;

use PDO;
use PDOStatement;

/**
 * @author https://phpdelusions.net/pdo/pdo_wrapper#comments
 */
class DB
{
    protected static $instance;
    protected PDO $pdo;

    public function __construct()
    {
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        // For reasons to why '127.0.0.1' instead of 'localhost' here,
        // @see https://stackoverflow.com/questions/20723803/pdoexception-sqlstatehy000-2002-no-such-file-or-directory
        $dsn = 'mysql:host=127.0.0.1'.';port='.$_ENV['DB_PORT'].';dbname='.$_ENV['DB_NAME'];
        $this->pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], $opt);
    }

    // a classical static method to make it universally available
    public static function instance(): DB
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // a proxy to native PDO methods
    public function __call($method, $args)
    {
        return call_user_func_array([$this->pdo, $method], $args);
    }

    // a helper function to run prepared statements smoothly
    public function run($sql, $args = []): bool|PDOStatement
    {
        if (!$args) {
            return $this->pdo->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);

        return $stmt;
    }
}
