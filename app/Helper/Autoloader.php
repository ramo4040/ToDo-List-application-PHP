<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT_PATH", dirname(__DIR__) . DS);

class Autoloader {
    public static function loader($className) {
        $file = $className . '.php';
        $file = str_replace('\\', '/', $file);
        self::fileExists($file);
    }

    public static function fileExists($file) {
        if (file_exists($file)) require_once $file;
    }
}

spl_autoload_register('Autoloader::loader');
