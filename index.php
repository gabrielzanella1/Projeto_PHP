<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <?php
    session_start();
    include 'config.php';
    include 'includes/header.php';

    if (isset($_SESSION['user_id'])) {
        echo "<a href='treinos/listar_treinos.php'>Listar Treinos</a><br>";
        // echo "Bora treinar, " . htmlspecialchars($_SESSION['user_name']) . "!";
        if ($_SESSION['user_type'] == 'professor') {
            echo "<a href='treinos/criar_treino.php'>Criar Treino</a><br>";
        }
        
    } else {
        //echo "Você não está logado.";
        
        echo "<a href='login.php' class='btn btn-info'>Fazer login</a>";
        echo "<br></br>";
        echo "<a href='register.php' class='btn btn-info'>Registrar-se</a>";
    }

    include 'includes/footer.php';
    ?> 
</body>
</html>


