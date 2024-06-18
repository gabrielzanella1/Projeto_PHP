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
          <a class="navbar-brand" href="index.php">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
      </div>
    </nav>
    
</body>
</html>


<?php
session_start();
include 'includes/header.php';
include 'config.php';
include 'functions/auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];

    if ($tipo == 'aluno') {
        // Atribuir um professor aleatório
        $stmt = $conn->query("SELECT id FROM professores ORDER BY RAND() LIMIT 1");
        $professor = $stmt->fetch(PDO::FETCH_ASSOC);
        $professor_id = $professor['id'];
    } else {
        $professor_id = null; // Professores não têm um professor atribuído
    }

    $registration_result = register($conn, $nome, $email, $senha, $tipo, $professor_id);
    if ($registration_result === true) {
        // Registro bem-sucedido, faça o login automaticamente
        if (login($conn, $email, $_POST['senha'])) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao fazer o login após o registro.";
        }
    } else {
        echo $registration_result;
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

