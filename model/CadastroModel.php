<?php
class CadastroModel {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao;
    }

    public function cadastrar($nome, $email, $senha) {
        // Verifica se email já existe
        $sql = "SELECT ID FROM usuario WHERE `E-MAIL` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        if ($stmt->get_result()->num_rows > 0) {
            return false; // Email já cadastrado
        }

        // Insere no banco (senha sem hash para simplificar)
        $sql = "INSERT INTO usuario (NOME_DE_USUARIO, `E-MAIL`, SENHA) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha);
        return $stmt->execute();
    }
}
?>