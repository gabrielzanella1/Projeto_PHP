<?php
function criarTreino($conn, $nome, $descricao, $professor_id) {
    $stmt = $conn->prepare("INSERT INTO treinos (nome, descricao, professor_id) VALUES (:nome, :descricao, :professor_id)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':professor_id', $professor_id);
    return $stmt->execute();
}

function listarTreinos($conn) {
    $stmt = $conn->prepare("SELECT * FROM treinos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function realizarTreino($conn, $aluno_id, $treino_id) {
    $stmt = $conn->prepare("INSERT INTO alunos_treinos (aluno_id, treino_id, data) VALUES (:aluno_id, :treino_id, NOW())");
    $stmt->bindParam(':aluno_id', $aluno_id);
    $stmt->bindParam(':treino_id', $treino_id);
    return $stmt->execute();
}
?>
