<?php
    require "conexao.php";

    echo "\nMeu sistema está conectado!";
    $sql = "CREATE TABLE IF NOT EXISTS teste (
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nome VARCHAR (100),
        idade INT
        )";
        $pdo->exec($sql);
        echo"<br> Tabela criada com sucesso!";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style-index.css">
    
</head>
<body>
    <a href= "idade.php"> Verificador de idade</a><br><br>
    <a href= "notas.php"> Verificador de notas</a><br><br>
    <a href= "notas3desafio.php"> Desafio notas</a><br><br>
    <a href= "login-basico.php"> Login</a><br><br>
    <a href= "cadastrar.php"> Cadastrar no Jogo</a><br><br>
</body>
</html>