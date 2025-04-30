<?php
public function login($email, $senha) {
    $sql = "SELECT u.*, p.Nome 
            FROM usuario u
            JOIN pessoa p ON u.PESSOA_ID = p.ID
            WHERE u.`E-MAIL` = ?";
    
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
                'email' => $usuario['E-MAIL']
            ];
        }
    }
    throw new Exception("Credenciais inválidas!");
}
?>