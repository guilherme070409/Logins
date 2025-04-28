<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
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

// Exibindo mensagens de sucesso ou erro se existirem
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
          <a class="nav-link active" href="index.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastro/cadastro.php">Cadastro</a>
        </li>
      </ul>

      <form action="../controller/AuthController.php" method="post">
        <input type="hidden" name="action" value="login">
            <div class="form-outline mb-4">
              <input type="email" id="loginName" name="email" class="form-control" required />
              <label class="form-label" for="loginName">E-MAIL</label>
            </div>
      
            <div class="form-outline mb-4">
              <input type="password" id="loginPassword" name="password" class="form-control" required />
              <label class="form-label" for="loginPassword">Senha</label>
            </div>
      
            <div class="row mb-4">
              <div class="col-md-6 d-flex justify-content-center">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="loginCheck" checked />
                  <label class="form-check-label" for="loginCheck"> Lembrar-me </label>
                </div>
              </div>
              <div class="col-md-6 d-flex justify-content-center">
                <a href="esqueceu a senha/Esquecido.php">Esqueceu a senha?</a>
              </div>
            </div>
      
            <button type="submit" class="btn btn-primary btn-block mb-4">Logar</button>
      </form>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
