<!DOCTYPE html>
<html>
<head>
    <title>Academia Costa e Cunha</title>
</head>
<body>
    <header>
        <h1>Academia</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Olá, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </header>
    <hr>
