<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Client</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h2>Add Client</h2>
    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST" action="/clients/add">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <label for="payment_status">Payment Status:</label>
        <input type="text" id="payment_status" name="payment_status" required>
        <button type="submit">Add Client</button>
    </form>
</body>
</html>
