<!DOCTYPE html>
<html>
<head>
    <title>Academia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header class="text-black d-flex justify-content-center mt-2">

        <h1>Academia Cleber & Cunha</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- <p>Olá, <<!-- ?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p> -->
            <!-- <a href="logout.php">Logout</a> -->
        <?php endif; ?>
    </header>   
    <hr>
