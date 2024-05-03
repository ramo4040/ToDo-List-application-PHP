<?php

namespace app\models;

use PDO;

class UserModel {

    public function __construct(private PDO $pdo) {
    }

    public function __destruct() {
        unset($this->pdo);
    }

    public function createUser($email, $userName, $password) {
        $statement = $this->pdo->prepare('INSERT INTO users (email, userName,password) VALUES (?,?,?)');
        $statement->execute([
            $email,
            $userName,
            $password
        ]);
    }

    public function getUserByUsername($username) {
        $statement = $this->pdo->prepare('SELECT * FROM users WHERE userName = ?');
        $statement->execute([$username]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
