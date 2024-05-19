<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class User
{
    private $conn;
    private $table = 'users';

    public $id;
    public $username;
    public $password;
    public $role;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function register($username, $password, $role)
    {
        $query = "INSERT INTO " . $this->table . " (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($username));
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->role = htmlspecialchars(strip_tags($role));

        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username LIMIT 0,1";
        $stmt = $this->conn->prepare($query);

        $this->username = htmlspecialchars(strip_tags($username));

        $stmt->bindParam(':username', $this->username);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->id = $row['id'];
            $this->username = $row['username'];
            $this->password = $row['password'];
            $this->role = $row['role'];

            if (password_verify($password, $this->password)) {
                return true;
            }
        }

        return false;
    }
}
