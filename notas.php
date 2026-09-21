<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas do Aluno</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="card">

    <h1>Notas do Aluno</h1>

    <form method="POST" action="notas.php">

        <div>
            <label for="nome">Nome do aluno:</label>

            <input
                type="text"
                id="nome"
                name="nome"
                required
                value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>"
            >
        </div>


        <div>
            <label for="idade">Idade:</label>

            <input
                type="number"
                id="idade"
                name="idade"
                min="0"
                required
                value="<?= htmlspecialchars($_POST['idade'] ?? '') ?>"
            >
        </div>


        <div>
            <label for="nota1">Nota 1 (Peso 2):</label>

            <input
                type="number"
                id="nota1"
                name="nota1"
                min="0"
                max="10"
                step="0.1"
                required
            >
        </div>


        <div>
            <label for="nota2">Nota 2 (Peso 3):</label>

            <input
                type="number"
                id="nota2"
                name="nota2"
                min="0"
                max="10"
                step="0.1"
                required
            >
        </div>


        <div>
            <label for="nota3">Nota 3 (Peso 1):</label>

            <input
                type="number"
                id="nota3"
                name="nota3"
                min="0"
                max="10"
                step="0.1"
                required
            >
        </div>


        <div>
            <label for="nota4">Nota 4 (Peso 1):</label>

            <input
                type="number"
                id="nota4"
                name="nota4"
                min="0"
                max="10"
                step="0.1"
                required
            >
        </div>


        <div>
            <label for="nota5">Nota 5 (Peso 3):</label>

            <input
                type="number"
                id="nota5"
                name="nota5"
                min="0"
                max="10"
                step="0.1"
                required
            >
        </div>


        <button type="submit">
            Calcular média
        </button>

    </form>


    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nome = trim($_POST["nome"]);
        $idade = (int) $_POST["idade"];

        $nota1 = (float) $_POST["nota1"];
        $nota2 = (float) $_POST["nota2"];
        $nota3 = (float) $_POST["nota3"];
        $nota4 = (float) $_POST["nota4"];
        $nota5 = (float) $_POST["nota5"];


        // Média ponderada

        $media = (
            ($nota1 * 2) +
            ($nota2 * 3) +
            ($nota3 * 1) +
            ($nota4 * 1) +
            ($nota5 * 3)
        ) / 10;


        // Situação do aluno

        if ($media >= 7) {

            $situacao = "APROVADO";
            $classeSituacao = "aprovado";

        } elseif ($media >= 5) {

            $situacao = "RECUPERAÇÃO";
            $classeSituacao = "recuperacao";

        } else {

            $situacao = "REPROVADO";
            $classeSituacao = "reprovado";
        }

        ?>


        <div class="resultado">

            <h2>Resultado</h2>

            <p>
                <strong>Nome:</strong>
                <?= htmlspecialchars($nome) ?>
            </p>

            <p>
                <strong>Idade:</strong>
                <?= $idade ?> anos
            </p>

            <p>
                <strong>Média:</strong>
                <?= number_format($media, 1, ',', '.') ?>
            </p>

            <p>
                <strong>Situação:</strong>

                <span class="<?= $classeSituacao ?>">
                    <?= $situacao ?>
                </span>

            </p>

        </div>


        <?php
    }
    ?>


    <div class="links">

        <a href="index.php">
            Calcular médias
        </a>

        <a href="idade.php">
            Verificar idade
        </a>

    </div>

</div>

</body>
</html>
