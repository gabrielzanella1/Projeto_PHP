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
