<?php
require_once __DIR__ . '/../service/conexao.php';

class AuthModel {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao;
    }

    public function login($email, $senha) {
        $sql = "SELECT u.*, p.Nome 
                FROM LOGINS.usuario u
                JOIN LOGINS.pessoa p ON u.PESSOA_ID = p.ID
                WHERE p.`E-MAIL` = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();

            if (password_verify($senha, $usuario['SENHA'])) {
                return [
                    'id' => $usuario['ID'],
                    'nome' => $usuario['Nome'],
                    'email' => $email
                ];
            }
        }

        throw new Exception("Credenciais inválidas!");
    }
}
?>
