<?php
class CadastroModel {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao;
    }

    public function cadastrar($nome, $email, $senha) {
        // Inicia transação
        $this->conn->begin_transaction();

        try {
            // 1. Cadastra na tabela pessoa
            $sqlPessoa = "INSERT INTO pessoa (Nome, `E-MAIL`) VALUES (?, ?)";
            $stmtPessoa = $this->conn->prepare($sqlPessoa);
            $stmtPessoa->bind_param("ss", $nome, $email);
            
            if (!$stmtPessoa->execute()) {
                throw new Exception("Erro ao cadastrar pessoa");
            }
            
            // 2. Obtém o ID da pessoa cadastrada
            $pessoa_id = $stmtPessoa->insert_id;
            
            // 3. Cadastra na tabela usuario
            $sqlUsuario = "INSERT INTO usuario (NOME_DE_USUARIO, SENHA, `E-MAIL`, PESSOA_ID) 
                           VALUES (?, ?, ?, ?)";
            $stmtUsuario = $this->conn->prepare($sqlUsuario);
            
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $stmtUsuario->bind_param("sssi", $nome, $senhaHash, $email, $pessoa_id);
            
            if (!$stmtUsuario->execute()) {
                throw new Exception("Erro ao cadastrar usuário");
            }

            // Commit se tudo der certo
            $this->conn->commit();
            return true;

        } catch (Exception $e) {
            // Rollback em caso de erro
            $this->conn->rollback();
            throw $e;
        }
    }
}
?>
