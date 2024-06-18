<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>


    <?php
    session_start();
    include 'config.php';

    include 'includes/header.php';
    

    if (isset($_SESSION['user_id'])) {
        echo "<a href='treinos/listar_treinos.php' class='btn btn-primary'>Listar Treinos</a><br>";
        echo "<a href='logout.php' class='btn btn-primary'>Sair</a>";
        // echo "Bora treinar, " . htmlspecialchars($_SESSION['user_name']) . "!";
        if ($_SESSION['user_type'] == 'professor') {
            echo "<a href='treinos/criar_treino.php' class='btn btn-primary'>Criar Treino</a><br>";
        }
        
    } else {
        //echo "Você não está logado.";
        
        echo "<div class='d-grid gap-2 col-4 mx-auto'>";
        echo "<a href='login.php' class='btn btn-primary btn btn-dark btn btn-primary btn-sm'>Fazer login</a>";
        echo "<br></br>";
        echo "<a href='register.php' class='btn btn-dark btn btn-secondary btn-sm'>Registrar-se</a>";
        echo "<div>";
    }

    // echo "<div>";
    // include 'includes/footer.php';
    // echo "<div>";
    
    ?> 

<div class="footer">
    <hr>
    <footer class="">
        <p>&copy; 2024 Academia Cleber & Cunha</p>
    </footer>
    <div>
</body>
</html>



