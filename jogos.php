<?php
require "conexao.php";

$sql = "CREATE TABLE IF NOT EXISTS jogos(
    id INT PRIMARY KEY
AUTO_INCREMENT,
    nome VARCHAR(100),
    genero VARCHAR(50),
    nota INT
)";

$pdo->exec($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de jogos</title>
    <link rel="stylesheet"href="style.css">
</head>

<body>
    <div class="card">
        <h1>Cadastro de jogos</h1>
        <form method="POST">
    
            <div>
                <label> Nome do jogo:</label>
                <input type="text" name="nome" required>
            </div>
            
            <div>
                <label>Gênero:</label>
                <input type="text" name="genero" required>
            </div>

            <div>
                <label>Nota:</label>
                <input type="number" name="nota" min="0" max="10" required>
            </div>
        
            <button type="submit">Cadastrar</button>
        </form>

        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nome = $_POST["nome"];
            $genero = $_POST["genero"];
            $nota = $_POST["nota"];

            $sql = "INSERT INTO Cadastro de jogos (nome, genero, nota)
                    VALUES ('$nome', '$genero', '$nota')";

            $pdo->exec($sql);

            echo "<p>Jogo cadastrado com sucesso!</p>";
        }
        
        ?>
    </div>
</body>

</html>