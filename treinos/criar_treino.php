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
if ($_SESSION['user_type'] != 'professor') {
    header("Location: ../index.php");
    exit();
}

include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config.php';
    include '../functions/treinos.php';

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    if (criarTreino($conn, $nome, $descricao, $_SESSION['user_id'])) {
        echo "Treino criado com sucesso!";
    } else {
        echo "Falha ao criar treino.";
    }
}
?>

<a href="../index.php" class="btn btn-info">Voltar ao Início</a>
<a href="../logout.php" class="btn btn-info">Logout</a>

<form method="POST">
    Nome do Treino: <input type="text" name="nome" required>
    Descrição: <textarea name="descricao" required></textarea>
    <button type="submit">Criar Treino</button>
</form>

<?php include '../includes/footer.php'; ?>

