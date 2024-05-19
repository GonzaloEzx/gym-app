<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Client</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h2>Delete Client</h2>
    <?php if (!empty($error)): ?>
        <p class="error"><?= $error ?></p>
    <?php else: ?>
        <p>Client deleted successfully.</p>
    <?php endif; ?>
    <a href="/clients">Back to Clients List</a>
</body>
</html>
