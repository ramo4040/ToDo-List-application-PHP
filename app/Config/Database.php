<?php

namespace app\Config;

require_once 'Config.php';

class DataBase {
    static $pdo = null;
    public static function getDB() {
        if (is_null(self::$pdo)) {
            $config = \Config::$info;
            self::$pdo = new \PDO($config['DB_DSN'], $config['DB_USER'], $config['DB_PASSWORD']);
        }

        return self::$pdo;
    }
}
