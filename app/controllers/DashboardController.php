<?php

namespace App\Controllers;

class DashboardController
{
    public function admin()
    {
        session_start();
        if ($_SESSION['role'] !== 'admin') {
            header('Location: /login');
            exit();
        }

        include __DIR__ . '/../views/dashboards/admin.php';
    }

    public function owner()
    {
        session_start();
        if ($_SESSION['role'] !== 'owner') {
            header('Location: /login');
            exit();
        }

        include __DIR__ . '/../views/dashboards/owner.php';
    }
}