<?php
class Aluno{
 
    // conexуo com o banco de dados e nome da tabela
    private $conn;
    private $nome_tabela = "alunos";
 
    // atributos da classe
    public $id;
    public $nome;
    public $email;
 
    // construtor da classe que recebe uma conexуo com o banco de dados
    public function __construct($db){
        $this->conn = $db;
    }
	
	// mщtodo para leitura de todos os alunos
	function read(){
		$query = "SELECT id, nome, email FROM alunos ORDER BY nome";

		// prepara query statement
		$stmt = $this->conn->prepare($query);

		// executa query
		$stmt->execute();

		return ($stmt);
	}
	
	// mщtodo para inclusуo de alunos
	function create(){
		$insert = "INSERT INTO " . $this->nome_tabela . " SET nome = :nome, email = :email";

		// prepara insert statement
		$stmt = $this->conn->prepare($insert);

		// remove caracteres especiais dos atributos
		$this->nome=htmlspecialchars(strip_tags($this->nome));
		$this->email=htmlspecialchars(strip_tags($this->email));

		// insere os valores dos atributos dentro dos parтmetros da conexуo
		$stmt->bindParam(":nome", $this->nome);
		$stmt->bindParam(":email", $this->email);

		// executa insert
		if ($stmt->execute())
			return (true);

		return (false);
	}
	
	// mщtodo para leitura de um determinado aluno
	function readOne(){
		$query = "SELECT id, nome, email FROM " . $this->nome_tabela . " WHERE id = ? LIMIT 0,1";

		// prepara query statement
		$stmt = $this->conn->prepare($query);

		// coloca o id do atributo no parтmetro da conexуo
		$stmt->bindParam(1, $this->id);

		// executa query
		$stmt->execute();

		// obtщm a resposta
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// preenche os atributos do aluno com os dados recebidos
		$this->id = $row['id'];
		$this->nome = $row['nome'];
		$this->email = $row['email'];
	}
	
	// mщtodo para atualizaчуo de alunos
	function update(){
		$update = "UPDATE " . $this->nome_tabela . " SET nome=:nome, email=:email WHERE id = :id";

		// prepara update statement
		$stmt = $this->conn->prepare($update);

		// remove caracteres especiais dos atributos
		$this->nome=htmlspecialchars(strip_tags($this->nome));
		$this->email=htmlspecialchars(strip_tags($this->email));
		$this->id=htmlspecialchars(strip_tags($this->id));

		// insere os valores dos atributos dentro dos parтmetros da conexуo
		$stmt->bindParam(":nome", $this->nome);
		$stmt->bindParam(":email", $this->email);
		$stmt->bindParam(":id", $this->id);

		// executa update
		if ($stmt->execute())
			return (true);

		return (false);
	}
	
	// mщtodo para exclusуo de alunos
	function delete(){
		$delete = "DELETE FROM " . $this->nome_tabela . " WHERE id = ?";

		// prepara delete statement
		$stmt = $this->conn->prepare($delete);

		// remove caracteres especiais dos atributos
		$this->id=htmlspecialchars(strip_tags($this->id));

		// insere os valores dos atributos dentro dos parтmetros da conexуo
		$stmt->bindParam(1, $this->id);

		// executa delete
		if ($stmt->execute())
			return (true);

		return (false);
	}
}
?>