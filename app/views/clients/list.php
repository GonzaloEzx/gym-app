<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients List</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h2>Clients List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Payment Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $client['id'] ?></td>
                    <td><?= $client['name'] ?></td>
                    <td><?= $client['email'] ?></td>
                    <td><?= $client['phone'] ?></td>
                    <td><?= $client['payment_status'] ?></td>
                    <td>
                        <a href="/clients/edit?id=<?= $client['id'] ?>">Edit</a>
                        <a href="/clients/delete?id=<?= $client['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
