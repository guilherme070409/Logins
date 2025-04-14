<?php

class usePDO
{
    private $servername ="localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "Banco de dados";
    private $instance;
}
function getInstance()
{
    if(empty($this->instance)) {
        $this->instance = $this->connection();
    }
    return $this->instance;
}

private function connection()
{
    try{
        $conn = new PDO("mysql:host=$this->servname;dbname=$this->dbname",$this->username,$this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch (PDOException $e) {
        die("Connection falied: " . $e->getmessage() . "<br>")
    }

    }
?>