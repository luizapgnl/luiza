<?php
    //1. DECLARAR O CAMINHO DO ARQUIVO JSON
    $caminho = __DIR__. "/dados.json";

    //2. ABRIR/LER O ARQUIVO JSON
    $json = file_get_contents($caminho);

    //3. TRANSFORMAR JSON EM ARRAY PHP
    $alunos = json_decode($json, true);
    if($_SERVER["REQUEST_METHOD"] == "POST")

    //4. CRIAR UM ALUNO
    $novoAluno = [
    "nome" => $_POST["nome"],
    "idade" => $_POST["idade"],
    "curso" => $_POST["curso"]
    ];
    
    //5. ADICIONAR O ALUNO NO ARRAY
    $notas[] = $novoAluno;

    //6. TRANSFORMAR ARRAY PHP EM JSON
    $jsonAtualizado = json_encode($alunos,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    //7. SALVAR NO ARQUIVO
    file_put_contents($caminho, $jsonAtualizado);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <from method= "POST">
        <label>Nome:</label>
        <input type="text" name="nome">
        <label>Idade:</label>
        <input type="number" name="idade">
        <label>Curso:</label>
        <input type="submit" name="curso">
        <button type="submit">Cadastrar</button>
    </from>

    <h2>ALUNOS CADASTRADOS</h2>
    <?php foreach($alunos as $aluno){ ?>
        <h3><?= $aluno["nome"] ?></h3>
        <p> Idade: <?= $aluno["idade"] ?></p>
        <p>Curso: <?= $aluno["curso"] ?></p>
    <?php } ?>
</body>
</html>