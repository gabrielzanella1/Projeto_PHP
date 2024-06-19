<!DOCTYPE html>
<html lang="pt-br">
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
            margin-top: 56px; 
        }
        .navbar {
            background-color: #000;
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
        .form-container .message {
            margin-top: 20px;
            font-size: 16px;
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
            <a class="navbar-brand" href="index.php">Academia Cleber & Cunha</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
        <div class="message">
            <?php
            session_start();
            include 'config.php';

            function login($conn, $email, $senha) {
                $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($senha, $user['senha'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nome'];
                    $_SESSION['user_type'] = $user['tipo'];
                    return true;
                }
                return false;
            }

            function register($conn, $nome, $email, $senha, $tipo, $professor_id = null) {
                // Verificar se o email já está em uso
                $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                $email_count = $stmt->fetchColumn();

                if ($email_count > 0) {
                    return "Email já está em uso.";
                }

                // Hashear a senha antes de inserir
                $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

                // Inserir novo usuário
                $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)");
                $stmt->bindParam(':nome', $nome);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $hashed_password);
                $stmt->bindParam(':tipo', $tipo);
                if ($stmt->execute()) {
                    $user_id = $conn->lastInsertId();
                    if ($tipo == 'aluno' && $professor_id) {
                        $stmt = $conn->prepare("INSERT INTO alunos_professores (aluno_id, professor_id) VALUES (:aluno_id, :professor_id)");
                        $stmt->bindParam(':aluno_id', $user_id);
                        $stmt->bindParam(':professor_id', $professor_id);
                        if ($stmt->execute()) {
                            return true;
                        } else {
                            return "Erro ao associar o aluno ao professor.";
                        }
                    }
                    return true;
                }
                return "Erro ao registrar o usuário.";
            }

            // Processar o formulário de cadastro
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $tipo = $_POST['tipo'];
            
                $result = register($conn, $nome, $email, $senha, $tipo);
            
            if ($result === true) {
                echo "<div class='alert alert-success'>Cadastro realizado com sucesso! Redirecionando para a página de login...</div>";
                // Aguarda 3 segundos antes de redirecionar
                header("refresh:3;url=login.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>$result</div>";
            }
            }
            ?>
        </div>
    </div>

    <footer>
        <p>2024 Academia Cleber & Cunha</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkWQ4z6ko19ffKtmeCpXlB1Gkkl8CITgYk4gGSK8d6ycLsU0a0b" crossorigin="anonymous"></script>
</body>
</html>
