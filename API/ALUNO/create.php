<?php
	// cabeçalhos obrigatórios
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Methods: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	// conexão com o banco de dados
	// incluindo os arquivos que criamos para a conexão
	include_once '../config/database.php';
	include_once '../objetos/aluno.php';

	// instanciar uma nova conexão com o banco 
	$database = new Database();
	$db = $database->getConnection();

	// instanciar um aluno passando a conexão com o banco
	$aluno = new Aluno($db);

	// obtém os dados enviados pelo post
	$dados = json_decode(file_get_contents("php://input"));

	// verifica se os dados recebidos possuem informações
	if (!empty($dados->nome) && !empty($dados->email))
	{
		// preenche o objeto aluno com os dados recebidos
		$aluno->nome = $dados->nome;
		$aluno->email = $dados->email;

		// executa o método create()
		if ($aluno->create())
		{
			// definição do código de resposta (created = 201)
			http_response_code(201);

			// envia mensagem confirmando que o aluno foi criado
			echo json_encode(array("message" => "Aluno criado com SUCESSO!"));
		}
		// se não for possível inserir o aluno
		else
		{
			// código de resposta 503 (service unvailable)
			http_response_code(503);

			// envia mensagem de ERRO
			echo json_encode(array("message" => "Não foi possível criar o aluno."));
		}
	}
?>