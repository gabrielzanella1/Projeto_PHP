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

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'professor') {
    echo "Acesso negado.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aluno_id = $_POST['aluno_id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $professor_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO treinos (nome, aluno_id, professor_id, descricao) VALUES (:nome, :aluno_id, :professor_id, :descricao)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':aluno_id', $aluno_id);
    $stmt->bindParam(':professor_id', $professor_id);
    $stmt->bindParam(':descricao', $descricao);
    if ($stmt->execute()) {
        echo "Treino criado com sucesso.";
    } else {
        echo "Erro ao criar treino.";
    }
}
?>

<form method="POST">
    Nome do Treino: <input type="text" name="nome" required><br>
    Aluno:
    <select name="aluno_id" required>
        <?php
        $stmt = $conn->query("SELECT id, nome FROM usuarios WHERE tipo = 'aluno'");
        while ($aluno = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$aluno['id']}'>{$aluno['nome']}</option>";
        }
        ?>
    </select>
    <br>
    Descrição: <textarea name="descricao" required></textarea>
    <button type="submit" class="btn btn-primary">Criar Treino</button>
</form>

<?php include '../includes/footer.php'; ?>



