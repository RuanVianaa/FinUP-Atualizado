<?php

require_once "BD\conexaoBD.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
	$sexo  = $_POST['sexo'] ?? '';
	$email   = $_POST['email'] ?? '';
	$senha  = $_POST['senha'] ?? '';
	$cpf = $_POST['cpf'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $nascimento = $_POST['nascimento'] ?? '';
	try{
		$sql = "INSERT INTO cadastro (sexo, email, senha, cpf, nome, nascimento) VALUES (:sexo, :email, :senha, :cpf, :nome, :nascimento)";
		$stmt = $conexao->prepare($sql);
		$stmt->execute([
			':sexo'  => $sexo,
			':email'   => $email,
			':senha'  => $senha,
			':cpf' => $cpf,
            ':nome' => $nome,
            ':nascimento' => $nascimento
		]);

		echo "<p>Registro cadastrado com sucesso!</p>";
	} catch (PDOException $e) {
    echo "Erro ao cadastrar: " . $e->getMessage();
	}
}

else {
	echo "<p>Requisição inválida.</p>";
} 	

?>

