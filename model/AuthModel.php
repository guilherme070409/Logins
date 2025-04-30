<?php
class AuthModel {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao;
    }

    public function login($email, $senha) {
        $sql = "SELECT * FROM usuario WHERE `E-MAIL` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            return ($senha == $usuario['SENHA']); // Simples (ou use password_verify() para +segurança)
        }
        return false;
    }
}
?>