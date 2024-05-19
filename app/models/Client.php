<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Client
{
    private $conn;
    private $table = 'clients';

    public $id;
    public $name;
    public $email;
    public $phone;
    public $payment_status;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function read()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create($name, $email, $phone, $payment_status)
    {
        $query = "INSERT INTO " . $this->table . " (name, email, phone, payment_status) VALUES (:name, :email, :phone, :payment_status)";
        $stmt = $this->conn->prepare($query);

        $this->name = htmlspecialchars(strip_tags($name));
        $this->email = htmlspecialchars(strip_tags($email));
        $this->phone = htmlspecialchars(strip_tags($phone));
        $this->payment_status = htmlspecialchars(strip_tags($payment_status));

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':payment_status', $this->payment_status);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function update($id, $name, $email, $phone, $payment_status)
    {
        $query = "UPDATE " . $this->table . " SET name = :name, email = :email, phone = :phone, payment_status = :payment_status WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($id));
        $this->name = htmlspecialchars(strip_tags($name));
        $this->email = htmlspecialchars(strip_tags($email));
        $this->phone = htmlspecialchars(strip_tags($phone));
        $this->payment_status = htmlspecialchars(strip_tags($payment_status));

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':payment_status', $this->payment_status);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($id));

        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
