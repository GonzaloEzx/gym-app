<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User();
            if ($user->login($username, $password)) {
                session_start();
                $_SESSION['user_id'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['role'] = $user->role;

                header('Location: /dashboard/admin');
                exit();
            } else {
                $error = 'Invalid username or password';
            }
        }

        include __DIR__ . '/../views/auth/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit();
    }
}
