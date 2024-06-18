<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Cleber & Cunha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('https://i.pinimg.com/564x/76/c7/6a/76c76a7a19d36104ad013fe959f5f8ef.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            margin-top: 56px; /* Adjust this if your navbar height is different */
        }
        .navbar {
            background-color: #000;
        }
        .navbar-brand {
            color: #fff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #fff;
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container input, .form-container select, .form-container button {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }
        .form-container button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #218838;
        }
        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="treinos/listar_treinos.php">Treinos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="form-container">
        <h2>Cadastro</h2>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <select name="tipo" required>
                <option value="aluno">Aluno</option>
                <option value="professor">Professor</option>
            </select>
            <button type="submit">Cadastre-se</button>
        </form>
        <p>Comece hoje para não se arrepender amanhã</p>
    </div>

    <footer>
        <p>2024 Academia Cleber & Cunha</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkWQ4z6ko19ffKtmeCpXlB1Gkkl8CITgYk4gGSK8d6ycLsU0a0b" crossorigin="anonymous"></script>
</body>
</html>
