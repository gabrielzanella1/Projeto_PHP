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
