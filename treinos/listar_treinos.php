<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Cleber & Cunha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #696969;
        }
        .navbar {
            background-color: #000;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff !important;
        }
        .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: #aaa;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .main-content {
            text-align: center;
            padding: 20px;
        }
        .table-container {
            margin: 20px auto;
            width: 80%;
        }
        table {
            width: 100%;
            text-align: left;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="../principal1.php">Início</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="main-content">
        <h1>Academia Cleber & Cunha</h1>
        <h2>Seus treinos</h2>
        <p>Comece hoje para não se arrepender amanhã!</p>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+ojBxj3OB3pGZV8eqMZrW1l/ArxNf" crossorigin="anonymous"></script>
</body>
</html>

<?php
session_start();
include '../config.php';

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

<a href='../principal1.php' class='btn btn-outline-light m-3'>Voltar</a>

<?php include '../includes/footer.php'; ?>