<?php

// 1. DECLARAR O CAMINHO DO ARQUIVO JSON
$caminho = __DIR__ . "/dados.json";

// 2. ABRIR/LER O ARQUIVO JSON
$json = file_get_contents($caminho);

// 3. TRANSFORMAR JSON EM ARRAY PHP
$alunos = json_decode($json, true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $acao = $_POST["acao"];

    if ($acao === "cadastrar") {

        // 4. CRIAR UM ALUNO
        $novoAluno = [
            "nome" => $_POST["nome"],
            "idade" => $_POST["idade"],
            "curso" => $_POST["curso"]
        ];

        // 5. ADICIONAR O ALUNO NO ARRAY
        $alunos[] = $novoAluno;

        // 6. TRANSFORMAR ARRAY PHP EM JSON
        $jsonAtualizado = json_encode(
            $alunos,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        // 7. SALVAR NO ARQUIVO
        file_put_contents($caminho, $jsonAtualizado);
    }

    if ($acao === "atualizar") {

        // PEGAR OS DADOS DO FORMULÁRIO
        $nome = $_POST["nome"];
        $idade = $_POST["idade"];
        $curso = $_POST["curso"];

        // PERCORRER TODOS OS ALUNOS
        foreach ($alunos as $posicao => $aluno) {

            if ($aluno["nome"] == $nome) {
                $alunos[$posicao]["idade"] = $idade;
                $alunos[$posicao]["curso"] = $curso;
            }
        }

        // TRANSFORMAR ARRAY PHP EM JSON
        $jsonAtualizado = json_encode(
            $alunos,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        // SALVAR NO ARQUIVO
        file_put_contents($caminho, $jsonAtualizado);
    }

    if ($acao === "deletar") {

        $nome = $_POST["nome"];


        // PERCORRER TODOS OS ALUNOS
        foreach ($alunos as $posicao => $aluno) {
            // verificar se enontrou os alunos
            if ($aluno["nome"] == $nome) {
                //deletar o aluno do array
                unset($alunos[$posicao]);
            }
        }
        
        // REORGANIZAR AS POSIÇÕES DO ARRAY
        $alunos = array_values($alunos);

        // TRANSFORMAR ARRAY PHP EM JSON
        $jsonAtualizado = json_encode(
            $alunos,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );

        // SALVAR NO ARQUIVO
        file_put_contents($caminho, $jsonAtualizado);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width,
        initial-scale=1.0">

    <title>Document</title>
</head>

<body>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome">

        <label>Idade:</label>
        <input type="number" name="idade">

        <label>Curso:</label>
        <input type="text" name="curso">

        <button type="submit" name="acao" value="cadastrar">
            Cadastrar
        </button>

    </form>

    <h2>ALUNOS CADASTRADOS</h2>

    <?php foreach ($alunos as $aluno) { ?>

        <h3><?= $aluno["nome"] ?></h3>

        <p>Idade: <?= $aluno["idade"] ?></p>

        <p>Curso: <?= $aluno["curso"] ?></p>

    <?php } ?>

    <h2>ATUALIZAR CADASTRO</h2>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome">

        <label>Idade:</label>
        <input type="number" name="idade">

        <label>Curso:</label>
        <input type="text" name="curso">

        <button type="submit"
                name="acao"
                value="atualizar">
            Atualizar
        </button>

    </form>

    <h2>DELETAR CADASTRO</h2>

    <form method="POST">

        <label>Nome:</label>
        <input type="text" name="nome">

        <button type="submit"
                name="acao"
                value="deletar">
            Deletar
        </button>

    </form>

</body>

</html>