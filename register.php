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
    include 'functions/auth.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];

    if (register($conn, $nome, $email, $senha, $tipo)) {
        // Registro bem-sucedido, faça o login automaticamente
        if (login($conn, $email, $_POST['senha'])) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao fazer o login após o registro.";
        }
    } else {
        echo "Registro falhou.";
    }
}
?>

<form method="POST">
    Nome: <input type="text" name="nome" required>
    Email: <input type="email" name="email" required>
    Senha: <input type="password" name="senha" required>
    Tipo: 
    <select name="tipo" required>
        <option value="aluno">Aluno</option>
        <option value="professor">Professor</option>
    </select>
    <button type="submit">Registrar</button>
</form>

<?php include 'includes/footer.php'; ?>
