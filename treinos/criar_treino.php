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

