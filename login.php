<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


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
include 'includes/header.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      include 'config.php';
      include 'functions/auth.php'; 
      $email = $_POST['email'];
      $senha = $_POST['senha'];

      if (login($conn, $email, $senha)) {
          header("Location: index.php");
      } else {
          echo "Login falhou.";
      }
  }
  ?>


<div class="d-grid gap-2 col-4 mx-auto">
  <form method="POST">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Não iremos compatilhar seu e-mail com mais ninguém.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Senha</label>
      <input type="password" class="form-control" name="senha" required id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
    <a href='register.php' class='btn btn-primary'>Cadastre-se</a>
  </form>
</div>




<?php include 'includes/footer.php'; ?>

</body>
</html>