<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h2>Admin Dashboard</h2>
    <p>Welcome, <?= $_SESSION['username'] ?></p>
    <a href="/logout">Logout</a>
</body>
</html>
