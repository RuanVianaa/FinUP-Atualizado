<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Consulta de Cadastro</title>
  <style>
	table,th,td{
		border: 1px solid black;
		border-collapse: collapse;
	}
  </style>
  
</head>
<body>
<?php 
	require_once "BD\conexaoBD.php";
	$stmt = $conexao->query("SELECT * FROM cadastro");
	$registros = $stmt->fetchAll();
?>

  <main>
    <h1>Lista de Registros</h1>
	<table>
        <thead>
            <tr>
                <th>sexo</th>
                <th>email</th>
                <th>senha</th>
                <th>cpf</th>
                <th>nome</th>
                <th>nascimento</th>
				<th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registros as $r){ ?>
                <tr>
                    <td><?= htmlspecialchars($r['sexo']) ?></td>
                    <td><?= htmlspecialchars($r['email']) ?></td>
                    <td><?= htmlspecialchars($r['senha']) ?></td>
					<td><?= htmlspecialchars($r['cpf']) ?></td>
                    <td><?= htmlspecialchars($r['nome']) ?></td>
                    <td><?= htmlspecialchars($r['nascimento']) ?></td>
                    <td>
                        <a href="editar_tabela1.php?id=<?= $r['id'] ?>">Editar</a>
                    </td>
                    <td>
                        <a href="excluir_tabela1.php?id=<?= $r['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este registro?');">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
  </main>

</body>
</html>

