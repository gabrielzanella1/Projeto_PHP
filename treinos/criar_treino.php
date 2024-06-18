<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Cleber & Cunha</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: url('https://i.pinimg.com/originals/1f/ab/8c/1fab8c6468e26ef315dd840e55ccdb17.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .navbar {
            background-color: #000; 
        }
        .navbar-brand {
            color: #fff;
            margin: 0 auto; 
            display: table; 
        }
        .navbar-brand:hover {
            color: #aaa; 
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white mx-auto" href="../index.php">Academia Cleber & Cunha</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="form-container">
        <?php
        session_start();
        include '../config.php';
        include '../includes/header.php';

        if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'professor') {
            echo "<div class='alert alert-danger'>Acesso negado.</div>";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $aluno_id = $_POST['aluno_id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $professor_id = $_SESSION['user_id'];

            $stmt = $conn->prepare("INSERT INTO treinos (nome, aluno_id, professor_id, descricao) VALUES (:nome, :aluno_id, :professor_id, :descricao)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':aluno_id', $aluno_id);
            $stmt->bindParam(':professor_id', $professor_id);
            $stmt->bindParam(':descricao', $descricao);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Treino criado com sucesso.</div>";
            } else {
                echo "<div class='alert alert-danger'>Erro ao criar treino.</div>";
            }
        }
        ?>

        <form method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Treino</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="aluno_id" class="form-label">Aluno</label>
                <select class="form-select" id="aluno_id" name="aluno_id" required>
                    <?php
                    $stmt = $conn->query("SELECT id, nome FROM usuarios WHERE tipo = 'aluno'");
                    while ($aluno = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$aluno['id']}'>{$aluno['nome']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Criar Treino</button>
            <a href='../principal1.php' class='btn btn-primary'>Voltar</a>
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2024 Academia Cleber & Cunha</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+ojBxj3OB3pGZV8eqMZrW1l/ArxNf" crossorigin="anonymous"></script>
</body>
</html>
