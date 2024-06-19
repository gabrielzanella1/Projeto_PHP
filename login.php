<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: url('https://i.pinimg.com/originals/1f/ab/8c/1fab8c6468e26ef315dd840e55ccdb17.jpg') no-repeat center center fixed;
            background-size: cover;
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
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #fff;
        }
        .main-title {
            text-align: center;
            color: #fff;
            margin-top: 20px;
        }
        .main-title h1 {
            margin: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="main-title">
        <h1>Academia Cleber & Cunha</h1>
    </div>

    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Não iremos compatilhar seu e-mail com mais ninguém.</div>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" required id="senha">
            </div>
            <div class="d-flex justify-content-between">
                <a href='register.php' class='btn btn-secondary'>Cadastre-se</a>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2024 Academia Cleber & Cunha</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+ojBxj3OB3pGZV8eqMZrW1l/ArxNf" crossorigin="anonymous"></script>
</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'config.php';
    include 'functions/auth.php';
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (login($conn, $email, $senha)) {
        header("Location: principal1.php");
    } else {
        echo "Login falhou.";
    }
}
?>
