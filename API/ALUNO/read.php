<?php
	// cabeçalhos obrigatórios
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	// conexão com o banco de dados
	// (inclusão dos arquivos necessários para conexão)
	include_once '../config/database.php';
	include_once '../objetos/aluno.php';

	// instanciar uma nova conexão com o banco de dados
	$database = new Database();
	$db = $database->getConnection();

	// instanciar um novo aluno passando
	// a conexão com o banco de dados
	$aluno = new Aluno($db);

	// lê os registros do banco de dados
	$stmt = $aluno->read();
	$num = $stmt->rowCount();

	// algum registro foi lido?
	if ($num > 0)
	{
		// sim, cria um array de alunos
		$alunos_arr = array();
		$alunos_arr["records"] = array();

		// recupera os registros da tabela
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			// enquanto existirem registros na tabela...
			// os registros são extraídos
			extract($row);
			$aluno_item=array("id" => $id, "nome" => $nome, "email" => $email);
			// inclui no array o aluno extraído
			array_push($alunos_arr["records"], $aluno_item);
		}

		// definição do código de resposta (OK = 200)
		http_response_code(200);

		// converte array em JSON e exibe
		echo json_encode($alunos_arr);
	}
	else
	{
		// não, código de resposta 404 (not found)
		http_response_code(404);

		// exibe mensagem de erro
		echo json_encode(array("message" => "Nenhum aluno encontrado!"));
	}
?>