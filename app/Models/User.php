<?php
require_once "../app/Core/Database.php";

class User extends Database
{
    public function register($name, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "INSERT INTO users (name, email, password, isNew, isAdmin) VALUES (?, ?, ?, ?, ?)"
        );

        return $stmt->execute([$name, $email, $hash, 1, 0]);
    }

    public function login($email, $password)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE email = ?"
        );
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
