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
    <link rel="stylesheet" href="/css/style-index.css">
</head>
<body>

    <div class="menu-card">
        <div class="status-box">
            <p>⚡ <?= $mensagem_conexao ?></p>
            <p>✔️ <?= $mensagem_tabela ?></p>
        </div>

        <h1>Atividades PHP</h1>
        <p class="logo">Selecione um projeto para acessar</p>

        <div class="nav-links">
            <li><a href="/projeto/idade.php" class="btn-menu">Verificador de idade</a></li>
            <li><a href="/projeto/notas.php" class="btn-menu">Verificador de notas</a></li>
            <li><a href="/projeto/notas3desafio.php" class="btn-menu">Desafio notas</a></li>
            <li><a href="/projeto/login-basico.php" class="btn-menu">Login</a></li>
            <li><a href="/projeto/jogos.php" class="btn-menu btn-destaque">Cadastrar no Jogo</a></li>
        </div>
    </div>

</body>
</html>