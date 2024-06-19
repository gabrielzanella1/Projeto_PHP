<?php
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
    $stmt = $conn->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $email_count = $stmt->fetchColumn();
    
    if ($email_count > 0) {
        return "Email já está em uso.";
    }

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, tipo) VALUES (:nome, :email, :senha, :tipo)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
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

?>
