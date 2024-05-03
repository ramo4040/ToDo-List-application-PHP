<?php

class Config {
    const DB_SERVER = "127.0.0.1";
    const DB_DATABASE = "todolist";

    public static $info = [
        "DB_USER" => "root",
        "DB_PASSWORD" => "123456",
        "DB_DSN" => "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_DATABASE
    ];
}
