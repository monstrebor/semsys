<?php
require_once "../app/Core/Database.php";

class User extends Database
{
    public function registerWithoutPassword($name, $email, $token)
    {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO users 
             (name, email, reset_token, reset_expires, isNew, isAdmin, isActive)
             VALUES (?, ?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR), 1, 0, 1)"
            );

            return $stmt->execute([$name, $email, $token]);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return false;
            }
            throw $e;
        }
    }
    public function isValidResetToken($token)
    {
        $stmt = $this->conn->prepare(
            "SELECT id FROM users 
         WHERE reset_token = ? AND reset_expires > NOW()"
        );
        $stmt->execute([$token]);
        return $stmt->fetch() !== false;
    }
    public function isValidToken($token)
    {
        $stmt = $this->conn->prepare(
            "SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW()"
        );
        $stmt->execute([$token]);
        return $stmt->fetch();
    }


    public function register($name, $email, $password)
    {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare(
                "INSERT INTO users (name, email, password, isNew, isAdmin, isActive)
             VALUES (?, ?, ?, ?, ?, ?)"
            );

            return $stmt->execute([$name, $email, $hash, 1, 0, 1]);
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                return false;
            }

            throw $e;
        }
    }
    public function setPasswordByToken($token, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "UPDATE users 
         SET password = ?, reset_token = NULL, reset_expires = NULL, isNew = 0
         WHERE reset_token = ? AND reset_expires > NOW()"
        );

        $stmt->execute([$hash, $token]);

        return $stmt->rowCount() === 1;
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
    public function all($excludeUserId = null)
    {
        if ($excludeUserId) {
            $stmt = $this->conn->prepare(
                "SELECT id, name, email, isAdmin, isActive 
             FROM users 
             WHERE id != ?
             ORDER BY id DESC"
            );
            $stmt->execute([$excludeUserId]);
        } else {
            $stmt = $this->conn->query(
                "SELECT id, name, email, isAdmin, isActive 
             FROM users 
             ORDER BY id DESC"
            );
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
