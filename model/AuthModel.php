<?php
require_once '../service/conexao.php';

class AuthModel {
    private $conn;

    public function __construct($conexao) {
        $this->conn = $conexao;
    }

    public function login($email, $senha) {
        // Consulta corrigida para buscar pelo email na tabela pessoa
        $sql = "SELECT u.*, p.Nome, p.`E-MAIL` as email_pessoa 
                FROM usuario u
                JOIN pessoa p ON u.PESSOA_ID = p.ID
                WHERE p.`E-MAIL` = ?";
        
        $stmt = $this->conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception("Erro na preparação da consulta: " . $this->conn->error);
        }
        
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            
            // Debug - Mostra os dados encontrados (verifique no php_error_log)
            error_log("Dados do usuário encontrado: " . print_r($usuario, true));
            
            // Verificação de senha (compatível com hash ou texto plano)
            if ($senha === $usuario['SENHA'] || password_verify($senha, $usuario['SENHA'])) {
                return [
                    'id' => $usuario['ID'],
                    'nome' => $usuario['Nome'],
                    'email' => $usuario['email_pessoa']
                ];
            } else {
                error_log("Senha não confere. Hash armazenado: " . $usuario['SENHA']);
            }
        }
        throw new Exception("Credenciais inválidas!");
    }
}
?>