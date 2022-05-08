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

	// define o atributo id do aluno com o id enviado pelo post
	$aluno->id = $dados->id;

	// executa o método delete()
	if ($aluno->delete())
	{
		// definição do código de resposta (OK = 200)
		http_response_code(200);

		// envia mensagem confirmando que o aluno foi removido
		echo json_encode(array("message" => "Aluno removido com SUCESSO!"));
	}
	// se não for possível remover o aluno
	else
	{
		// código de resposta 503 (service unvailable)
		http_response_code(503);

		// envia mensagem de ERRO
		echo json_encode(array("message" => "Não foi possível remover o aluno."));
	}
?>