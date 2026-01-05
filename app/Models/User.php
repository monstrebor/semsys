<?php
require_once "../app/Core/Database.php";

class User extends Database
{
    public function register($name, $email, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "INSERT INTO users (name, email, password, isNew, isAdmin, isActive) VALUES (?, ?, ?, ?, ?, ?)"
        );

        return $stmt->execute([$name, $email, $hash, 1, 0, 1]);
    }

    public function create(array $data)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO users (name, email, password, isAdmin, isActive) VALUES (?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['password'],
            $data['isAdmin'],
            1 
        ]);
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

    public function all()
    {
        $stmt = $this->conn->query("SELECT id, name, email, isAdmin, isActive FROM users ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
