<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Usuários</title>
    <link rel="stylesheet" href="dados.css">
    <link rel="icon" href="Images/FinUp.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <header class="header"> <img class="logo" src="Images/FinUp.png" alt="Logo FinUp">
        <nav>
            <ul class="main-nav">
                <li><a href="historia.html">Sobre <i class="fas fa-info-circle meu-icone"></i></a></li>
                <li><a href="consultadados.html">Seus Dados <i class="fa-solid fa-circle-user"></i></a></li>
                <li><a href="consultaextrato.html" class="ativo">Extrato <i class="fa-solid fa-receipt"></i></a></li>
                <li><a href="consultatransacoes.html">Transações <i class="fa-solid fa-money-bill-transfer"></i></a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="perfil">
        <h1>Meus Dados</h1>
        <p class="descricao">Visualize e atualize suas informações de perfil.</p>

        <section class="informações">
            <h2>Perfil</h2>
            <form action = "cadastrotabela1.php" method="post" class="perfil-form">
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
                <div class="informacoes-gerais">
                    <label for="nome">Nome Completo:</label>
                    <input type="text" id="nome" name="nome" >
                </div>
                <div class="informacoes-gerais">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" >
                </div>
                <div class="informacoes-gerais">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha">
                </div>
                <div class="informacoes-gerais">
                    <label for="nascimento">Data de Nascimento:</label>
                    <input type="date" id="nascimento" name="nascimento">
                </div>
                <div class="informacoes-gerais">
                    <label for="sexo">Sexo:</label>
                    <input type="text" id="sexo" name="sexo">
                </div>
                 <div class="informacoes-gerais">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf">
                </div>
                
                

                <div class="botoes-perfil">
                    <button type="submit" class="save-profile-button">Salvar Alterações</button>
                </div>
            </form>
        </section>
    </main>

    <footer class="rodape">
        <p>Desenvolvido por: Bianca Serafim, Ruan Viana</p>
    </footer>
</body>

</html>