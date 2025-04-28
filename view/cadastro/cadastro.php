<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cadastro.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro</title>
    <style>
        .alert {
            margin: 15px;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php
session_start();

if(isset($_SESSION['msg_sucesso'])){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            ".$_SESSION['msg_sucesso']."
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    unset($_SESSION['msg_sucesso']);
}

if(isset($_SESSION['msg_erro'])){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            ".$_SESSION['msg_erro']."
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    unset($_SESSION['msg_erro']);
}
?>

  <div class="login-container">
    <ul class="nav nav-pills nav-justified mb-3">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="cadastro.php">Cadastro</a>
        </li>
    </ul>

    <form action="../controller/CadastroController.php" method="post">
      <div class="form-outline mb-4">
        <input type="text" name="Nome" id="registerName" class="form-control" required />
        <label class="form-label" for="registerName">Nome</label>
      </div>

      <div class="form-outline mb-4">
        <input type="text" name="Usuario" id="registerUsername" class="form-control" required />
        <label class="form-label" for="registerUsername">Nome de Usuario</label>
      </div>

      <div class="form-outline mb-4">
        <input type="email" name="Email" id="registerEmail" class="form-control" required />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <div class="form-outline mb-4">
        <input type="password" name="Senha" id="registerPassword" class="form-control" required />
        <label class="form-label" for="registerPassword">Senha</label>
      </div>

      <div class="form-outline mb-4">
        <input type="password" name="repita" id="registerRepeatPassword" class="form-control" required />
        <label class="form-label" for="registerRepeatPassword">Repita a senha</label>
      </div>

      <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" id="registerCheck" required />
        <label class="form-check-label" for="registerCheck">
          Eu li todos os termos
        </label>
      </div>

      <button type="submit" class="btn btn-primary btn-block mb-3">Cadastrar</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
