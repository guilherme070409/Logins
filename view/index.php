
<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<?php
session_start();

if(isset($_SESSION['msg_sucesso'])){
    echo "<div class='alert alert-success'>".$_SESSION['msg_sucesso']."</div>";
    unset($_SESSION['msg_sucesso']);
}


if(isset($_SESSION['msg_erro'])){
    echo "<div class='alert alert-danger'>".$_SESSION['msg_erro']."</div>";
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

      <form>
            <div class="form-outline mb-4">
              <input type="email" id="loginName" class="form-control" />
              <label class="form-label" for="loginName">E-MAIL</label>
            </div>
      
            <div class="form-outline mb-4">
              <input type="password" id="loginPassword" class="form-control" />
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
      
            <div class="text-center">
              <a href="cadastro/cadastro.php">Não cadastrado?  cadastro</a>
            </div>
      </form>
  </div>
</body>
</html>