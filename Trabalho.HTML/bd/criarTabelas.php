<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'FinUp';

try 
{
    $dsn = "mysql:host=$servidor;dbname=$banco;charset=utf8"; 
    $conexao = new PDO($dsn, $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "
        CREATE TABLE IF NOT EXISTS cadastro (
            id INT AUTO_INCREMENT PRIMARY KEY,
            sexo ENUM ('Masculino', 'Feminino', 'Outros') NOT NULL,
            email VARCHAR(300) NOT NULL,
            senha VARCHAR(255) NOT NULL,
            cpf VARCHAR(14) NOT NULL,
            nome VARCHAR(50) NOT NULL,
            data_nascimento DATE NULL
        )
    ";
    $conexao->exec($sql);
    echo "Tabela 'cadastro' criada com sucesso (ou já existia).<br>";

    $sql = "
        CREATE TABLE IF NOT EXISTS tabela2 (
            id INT AUTO_INCREMENT PRIMARY KEY,
            campo2 VARCHAR(100) NOT NULL,
            campo3 VARCHAR(150) NOT NULL,
            campo4 VARCHAR(20),
            campo5 TEXT
        );
    ";
    $conexao->exec($sql);
    echo "Tabela 'tabela2' criada com sucesso (ou já existia).<br>";

} catch (PDOException $e) {
    echo "Erro ao criar a tabela: " . $e->getMessage();
}
?>

