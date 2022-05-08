<?php
class Database{
 
    // dados para acesso ao banco de dados
    private $host = "localhost";
    private $db_name = "nome do banco";
    private $username = "nome do usuario";
    private $password = "senha do banco";
    public $conn;
 
    // método responsável por realizar a conexão com o banco.
	//faz a conexão e retorna a conexão ativa.
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>