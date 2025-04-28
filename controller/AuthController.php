<?php
require '../model/AuthModel.php';
require '../service/conexao.php';

session_start();

class AuthController {
    public static function login() {
        if($_POST){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            try {
                if(loginUser($email, $password)){
                    $_SESSION['msg_sucesso'] = "Login realizado com sucesso!";
                    header("Location: ../view/pagina_inicial.php");
                    exit();
                } else {
                    $_SESSION['msg_erro'] = "Email ou senha incorretos!";
                    header("Location: ../view/index.php");
                    exit();
                }
            } catch (Exception $e) {
                $_SESSION['msg_erro'] = "Erro: " . $e->getMessage();
                header("Location: ../view/index.php");
                exit();
            }
        }
    }
    
    public static function logout() {
        session_destroy();
        header("Location: ../view/index.php");
        exit();
    }

    public static function recuperarSenha() {
        if($_POST && isset($_POST['email'])) {
            $email = $_POST['email'];

            $_SESSION['msg_recuperacao'] = "Se o email existir, enviaremos um link!";
            header("Location: ../view/outra_pasta/esquecido.php");
            exit();
        }
    }
}
?>
