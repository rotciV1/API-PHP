<?php
	// cabeçalhos obrigatórios
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: access");
	header("Access-Control-Allow-Methods: GET");
	header("Access-Control-Allow-Credentials: true");
	header('Content-Type: application/json');

	// conexão com o banco de dados
	// incluindo os arquivos que criamos para a conexão
	include_once '../config/database.php';
	include_once '../objetos/aluno.php';

	// instanciar uma nova conexão com o banco 
	$database = new Database();
	$db = $database->getConnection();

	// instanciar um aluno passando a conexão com o banco
	$aluno = new Aluno($db);

	// define o id do aluno, de acordo com o id enviado pelo get
	$aluno->id = isset($_GET['id']) ? $_GET['id'] : die();

	// lê os dados do aluno com o método readOne()
	$aluno->readOne();

	// registro encontrado?
	if ($aluno->nome != null)
	{
		// sim, cria um array com os dados do aluno
		$aluno_arr = array("id" => $aluno->id, "nome" => $aluno->nome, "email" => $aluno->email);

		// definição do código de resposta (OK = 200)
		http_response_code(200);

		// converte array em JSON e exibe
		echo json_encode($aluno_arr);
	}
	else
	{
		// não, código de resposta 404 (not found)
		http_response_code(404);

		// envia mensagem de ERRO
		echo json_encode(array("message" => "O aluno informado não existe."));
	}
?>