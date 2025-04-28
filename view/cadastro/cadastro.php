<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="cadastro.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

<?php
session_start();
// Mostra mensagem de sucesso
if(isset($_SESSION['msg_sucesso'])){
    echo "<div class='alert alert-success'>".$_SESSION['msg_sucesso']."</div>";
    unset($_SESSION['msg_sucesso']);
}

// Mostra mensagem de erro
if(isset($_SESSION['msg_erro'])){
    echo "<div class='alert alert-danger'>".$_SESSION['msg_erro']."</div>";
    unset($_SESSION['msg_erro']);
}
?>

  <div class="login-container">
    <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="tab-login" data-mdb-pill-init href="../index.php" role="tab"
            aria-controls="pills-login" aria-selected="true">Login</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link active" id="tab-register" data-mdb-pill-init href="cadastro.php" role="tab"
            aria-controls="pills-register" aria-selected="true">Cadastro</a>
        </li>
    </ul>

    <p class="text-center">or:</p>

    <form action="../controler/CadastroControler.php" method="POST"> 
      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="Nome" id="registerName" class="form-control" />
        <label class="form-label" for="registerName">Nome</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="text" name="Usuario" id="registerUsername" class="form-control" />
        <label class="form-label" for="registerUsername">Nome de Usuario</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="email" name="Email id="registerEmail" class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="Senha" id="registerPassword" class="form-control" />
        <label class="form-label" for="registerPassword">Senha</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" name="repita" id="registerRepeatPassword" class="form-control" />
        <label class="form-label" for="registerRepeatPassword">Repita a senha</label>
      </div>

      <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
          aria-describedby="registerCheckHelpText" />
        <label class="form-check-label" for="registerCheck">
          Eu li todos os termos
        </label>
      </div>

      <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-3">logar</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"></script>
</body>
</html>