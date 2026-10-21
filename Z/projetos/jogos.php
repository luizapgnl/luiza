<?php

require __DIR__ . "/../conexao.php";

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"] ?? '';
    $genero = $_POST["genero"] ?? '';
    $nota = $_POST["nota"] ?? '';
    $ano_lancamento = $_POST["ano_lancamento"] ?? '';

    try {

        $stmt = $pdo->prepare(
            "INSERT INTO jogos (nome, genero, nota, ano_lancamento)
            VALUES (:nome, :genero, :nota, :ano_lancamento)"
        );

        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':genero', $genero);
        $stmt->bindValue(':nota', $nota, PDO::PARAM_INT);
        $stmt->bindValue(':ano_lancamento', $ano_lancamento, PDO::PARAM_INT);

        $stmt->execute();

        $mensagem = "<p class='sucesso'>Jogo cadastrado com sucesso!</p>";

    } catch (PDOException $e) {

        $mensagem = "<p class='erro'>Erro ao cadastrar: "
            . htmlspecialchars($e->getMessage())
            . "</p>";
    }
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de jogos</title>

    <link rel="stylesheet" href="/css/jogos.css">

</head>

<body>

    <div class="card">

        <h1>Cadastro de jogos</h1>

        <form method="POST">

            <div>
                <label>Nome do jogo:</label>

                <input type="text" name="nome" required>
            </div>

            <div>
                <label>Gênero:</label>

                <input type="text" name="genero" required>
            </div>

            <div>
                <label>Nota:</label>

                <input
                    type="number"
                    name="nota"
                    min="0"
                    max="10"
                    required
                >
            </div>

            <div>
                <label>Ano de Lançamento:</label>

                <input
                    type="number"
                    name="ano_lancamento"
                    min="1950"
                    max="2030"
                    required
                >
            </div>

            <button type="submit">Cadastrar</button>
            

<?= $mensagem ?>

<a href="/index.php" class="voltar-menu">Voltar ao menu</a>

        </form>


        <?= $mensagem ?>

        </a>

    </div>

</body>

</html>