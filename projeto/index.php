<?php
require "conexao.php";

$mensagem_conexao = "Meu sistema está conectado!";
$mensagem_tabela = "Tabela sincronizada com sucesso!";

try {
    $sql = "CREATE TABLE IF NOT EXISTS teste (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nome VARCHAR(100),
        idade INT
    )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    $mensagem_tabela = "Erro na tabela: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividades em PHP</title>
    <link rel="stylesheet" href="style-index.css">
</head>
<body>

    <div class="menu-card">
        <div class="status-box">
            <p>⚡ <?= $mensagem_conexao ?></p>
            <p>✔️ <?= $mensagem_tabela ?></p>
        </div>

        <h1>Atividades PHP</h1>
        <p class="subtitulo">Selecione um projeto para acessar</p>

        <div class="nav-links">
            <a href="idade.php" class="btn-menu">Verificador de idade</a>
            <a href="notas.php" class="btn-menu">Verificador de notas</a>
            <a href="notas3desafio.php" class="btn-menu">Desafio notas</a>
            <a href="login-basico.php" class="btn-menu">Login</a>
            <a href="jogos.php" class="btn-menu btn-destaque">Cadastrar no Jogo</a>
        </div>
    </div>

</body>
</html>