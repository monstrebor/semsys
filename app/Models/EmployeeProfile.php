<?php
require_once "../app/Core/Database.php";

class EmployeeProfile extends Database
{
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO employee_profiles
            (user_id, employee_id, employee_type, department, position, campus, employment_status, date_hired)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['user_id'],
            $data['employee_id'],
            $data['employee_type'],
            $data['department'],
            $data['position'],
            $data['campus'],
            $data['employment_status'],
            $data['date_hired']
        ]);
    }

    public function findByUserId($userId)
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM employee_profiles
            WHERE user_id = ?
            LIMIT 1
        ");

        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function all()
    {
        $stmt = $this->conn->prepare("
        SELECT 
            u.id,
            u.name,
            u.email,
            u.isActive,
            e.employee_id,
            e.employee_type,
            e.department,
            e.position,
            e.campus,
            e.employment_status,
            e.date_hired
        FROM users u
        INNER JOIN employee_profiles e ON e.user_id = u.id
        ORDER BY u.id DESC
    ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
