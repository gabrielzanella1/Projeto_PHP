<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="">
            <a class="navbar-brand" href="../index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> 
</body>
</html>

<?php
session_start();
include '../config.php';
include '../includes/header.php';

if (!isset($_SESSION['user_id'])) {
    echo "Acesso negado.";
    exit();
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

if ($user_type == 'professor') {
    $stmt = $conn->prepare("SELECT t.id, t.nome, t.descricao, u.nome AS aluno_nome FROM treinos t JOIN usuarios u ON t.aluno_id = u.id WHERE t.professor_id = :user_id");
} else {
    $stmt = $conn->prepare("SELECT t.id, t.nome, t.descricao, u.nome AS professor_nome FROM treinos t JOIN usuarios u ON t.professor_id = u.id WHERE t.aluno_id = :user_id");
}

$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$treinos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Lista de Treinos</h2>
<table border="1">
    <tr>
        <th>Nome do Treino</th>
        <th>Descrição</th>
        <th><?php echo ($user_type == 'professor') ? 'Aluno' : 'Professor'; ?></th>
    </tr>
    <?php foreach ($treinos as $treino): ?>
        <tr>
            <td><?php echo htmlspecialchars($treino['nome']); ?></td>
            <td><?php echo htmlspecialchars($treino['descricao']); ?></td>
            <td><?php echo htmlspecialchars(($user_type == 'professor') ? $treino['aluno_nome'] : $treino['professor_nome']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href='../logout.php' class='btn btn-primary'>Sair</a>

<?php include '../includes/footer.php'; ?>

