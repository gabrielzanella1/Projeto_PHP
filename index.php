<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    include 'config.php';
    include 'includes/header.php';

    if (isset($_SESSION['user_id'])) {
        echo "Bora treinar, " . htmlspecialchars($_SESSION['user_name']) . "!";
        echo "<br>";
        if ($_SESSION['user_type'] == 'professor') {
            echo "<a href='treinos/criar_treino.php'>Criar Treino</a><br>";
        }
        echo "<a href='treinos/listar_treinos.php'>Listar Treinos</a><br>";
    } else {
        echo "Você não está logado.";
        echo "<br></br>";
        
        echo "<a href='login.php' class='btn btn-info'>Fazer login</a>";
        echo "<br></br>";
        echo "<a href='register.php' class='btn btn-info'>Registrar-se</a>";
    }

    include 'includes/footer.php';
    ?> 
</body>
</html>


