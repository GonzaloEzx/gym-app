<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h2>Edit Client</h2>
    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="/clients/edit?id=<?= $client['id'] ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $client['name'] ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $client['email'] ?>" required>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?= $client['phone'] ?>" required>
        <label for="payment_status">Payment Status:</label>
        <input type="text" id="payment_status" name="payment_status" value="<?= $client['payment_status'] ?>" required>
        <button type="submit">Update Client</button>
    </form>
</body>
</html>
