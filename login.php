<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>

<?php
session_start();
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'config.php';
    include 'functions/auth.php'; // Certifique-se de que o caminho está correto

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (login($conn, $email, $senha)) {
        header("Location: index.php");
    } else {
        echo "Login falhou.";
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required>
    Senha: <input type="password" name="senha" required>
    <button type="submit">Login</button>
</form>

<a href="register.php" class="btn btn-info">Registrar-se</a>
<br></br>
<a href="index.php" class="btn btn-info">Página Inicial</a>


<?php include 'includes/footer.php'; ?>
