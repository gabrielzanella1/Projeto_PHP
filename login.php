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

<?php include 'includes/footer.php'; ?>
