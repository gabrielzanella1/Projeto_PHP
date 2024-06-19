<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redireciona para a página de login se não estiver logado
    header("Location: login.php");
    exit();
}

$user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="pt-br">
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
            color: #fff;
        }
        .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: #aaa;
        }
        .card {
            border: none;
            width: 30%; 
            margin: 0 auto; 
            height: 480px; 
            overflow: hidden; 
            text-decoration: none;
        }
        .card-img {
            height: auto;
            max-width: 100%;
            width: 100%;
        }
        .card-img-overlay {
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px #000;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
        }
        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            gap: 20px;
        }
        .text-white {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">Academia Cleber & Cunha</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link">Bem-vindo, <?php echo htmlspecialchars($user_name); ?>!</span>
                    </li>
                </ul>
            </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="container main-content">
        <div class="card">
            <img src="https://i.pinimg.com/originals/6c/63/52/6c6352f8aafe5c6f6ab2e82a07f339be.jpg" class="card-img" alt="Login">
            <div class="card-img-overlay">
                <a href="treinos/listar_treinos.php" class="stretched-link text-white">Listar Treinos</a>
            </div>
        </div>
        <div class="card">
            <img src="https://i.pinimg.com/originals/11/81/be/1181bee04cb751a93f278ef9aee3b481.jpg" class="card-img" alt="Register">
            <div class="card-img-overlay">
                <a href="treinos/criar_treino.php" class="stretched-link text-white">Criar Treinos</a>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Comece hoje para não se arrepender amanhã!</p>
    </div>

    <div class="footer">
        <p>&copy; 2024 Academia Cleber & Cunha</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+ojBxj3OB3pGZV8eqMZrW1l/ArxNf" crossorigin="anonymous"></script>
</body>
</html>
