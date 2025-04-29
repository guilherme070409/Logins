<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <!-- Mensagens de sucesso ou erro -->
            <?php
session_start();
if(isset($_SESSION['msg_erro'])){
    echo "<p style='color: red;'>".$_SESSION['msg_erro']."</p>";
    unset($_SESSION['msg_erro']);
}
if(isset($_SESSION['msg_sucesso'])){
    echo "<p style='color: green;'>".$_SESSION['msg_sucesso']."</p>";
    unset($_SESSION['msg_sucesso']);
}
?>

                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header text-center">
                    <h2>Cadastro</h2>
                </div>
                <div class="card-body">
                <form method="POST" action="../../controller/CadastroController.php">
                        <div class="mb-3">
                            <label for="Nome" class="form-label">Nome completo</label>
                            <input type="text" class="form-control" name="Nome" id="Nome" required>
                        </div>

                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="Email" id="Email" required>
                        </div>

                        <div class="mb-3">
                            <label for="Senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="Senha" id="Senha" required>
                        </div>

                        <div class="mb-3">
                            <label for="repita" class="form-label">Repita a Senha</label>
                            <input type="password" class="form-control" name="repita" id="repita" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>

                        <div class="text-center mt-3">
                            <a href="../../index.php" class="btn btn-link">Voltar para login</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
