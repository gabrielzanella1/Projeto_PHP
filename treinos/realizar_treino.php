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
if ($_SESSION['user_type'] != 'aluno') {
    header("Location: ../index.php");
    exit();
}

include '../config.php';
include '../functions/treinos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $treino_id = $_POST['treino_id'];
    if (realizarTreino($conn, $_SESSION['user_id'], $treino_id)) {
        echo "Treino realizado com sucesso!";
    } else {
        echo "Falha ao registrar treino.";
    }
} else {
    header("Location: listar_treinos.php");
}
?>
