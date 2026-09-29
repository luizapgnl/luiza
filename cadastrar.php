<?php

require 'conexao.php';

$sqlCriarTabela = "CREATE TABLE IF NOT EXISTS jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    nota INT NOT NULL,
    ano_lancamento INT NOT NULL
)";


$pdo->exec($sqlCriarTabela);

$mensagem = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nome = $_POST["nome"];
    $genero = $_POST["genero"];
    $nota = $_POST["nota"];
    $ano_lancamento = $_POST["ano_lancamento"];


    $sqlInsert = "INSERT INTO jogos (nome, genero, nota, ano_lancamento) 
                  VALUES ('$nome', '$genero', $nota, $ano_lancamento)";

 
    $pdo->exec($sqlInsert);

    
    $mensagem = "Jogo cadastrado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Jogos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Cadastrar Jogo</h2>

    <?php if (!empty($mensagem)): ?>
        <p style="color: green; font-weight: bold;"><?php echo $mensagem; ?></p>
    <?php endif; ?>

    
    <form action="cadastrar.php" method="POST">
        <div>
            <label for="nome">Nome do Jogo:</label><br>
            <input type="text" id="nome" name="nome" required>
        </div>
        <br>
        <div>
            <label for="genero">Gênero:</label><br>
            <input type="text" id="genero" name="genero" required>
        </div>
        <br>
        <div>
            <label for="nota">Nota (0 a 10):</label><br>
            <input type="number" id="nota" name="nota" min="0" max="10" required>
        </div>
        <br>
        <div>
            <label for="ano_lancamento">Ano de Lançamento:</label><br>
            <input type="number" id="ano_lancamento" name="ano_lancamento" min="1950" max="2030" required>
        </div>
        <br>
        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>