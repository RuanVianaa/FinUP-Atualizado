<?php 
	require_once "BD\conexaoBD.php";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$stmt = $conexao->prepare("DELETE FROM cadastro WHERE id = :id");
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			header("Location: consultadados.php"); 
			exit;
		} else {
			echo "Erro ao excluir o registro.";
		}
	} else {
		echo "ID não fornecido.";
	}
?>

