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
