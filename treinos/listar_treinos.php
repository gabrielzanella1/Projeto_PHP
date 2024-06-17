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
include '../includes/header.php';
include '../config.php';
include '../functions/treinos.php';

$treinos = listarTreinos($conn);
?>

<h2>Lista de Treinos</h2>
<a href="../index.php" class="btn btn-info">Voltar ao Início</a>
<br></br>
<a href="../logout.php" class="btn btn-info">Logout</a>
<ul>
    <?php foreach ($treinos as $treino): ?>
        <li>
            <?php echo htmlspecialchars($treino['nome']); ?> - 
            <?php echo htmlspecialchars($treino['descricao']); ?>
            <?php if ($_SESSION['user_type'] == 'aluno'): ?>
                <form method="POST" action="realizar_treino.php">
                    <input type="hidden" name="treino_id" value="<?php echo $treino['id']; ?>">
                    <button type="submit">Realizar Treino</button>
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>

<?php include '../includes/footer.php'; ?>
