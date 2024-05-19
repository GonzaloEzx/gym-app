<?php

namespace App\Controllers;

use App\Models\Client;

class ClientController
{
    public function list()
    {
        $client = new Client();
        $stmt = $client->read();
        $clients = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        include __DIR__ . '/../views/clients/list.php';
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $payment_status = $_POST['payment_status'];

            $client = new Client();
            if ($client->create($name, $email, $phone, $payment_status)) {
                header('Location: /clients');
                exit();
            } else {
                $error = 'Failed to add client';
            }
        }

        include __DIR__ . '/../views/clients/add.php';
    }

    public function edit($id)
    {
        $client = new Client();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $payment_status = $_POST['payment_status'];

            if ($client->update($id, $name, $email, $phone, $payment_status)) {
                header('Location: /clients');
                exit();
            } else {
                $error = 'Failed to update client';
            }
        } else {
            $stmt = $client->read();
            $clients = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $client = array_filter($clients, fn($client) => $client['id'] == $id)[0];
        }

        include __DIR__ . '/../views/clients/edit.php';
    }

    public function delete($id)
    {
        $client = new Client();
        if ($client->delete($id)) {
            header('Location: /clients');
            exit();
        } else {
            $error = 'Failed to delete client';
        }

        include __DIR__ . '/../views/clients/delete.php';
    }
}