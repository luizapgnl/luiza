<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Médias</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="card">

    <h1>Calcular Médias</h1>

    <form method="POST" action="index.php">

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
            Calcular situação
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


        // Cálculo da média ponderada

        $media = (
            ($nota1 * 2) +
            ($nota2 * 3) +
            ($nota3 * 1) +
            ($nota4 * 1) +
            ($nota5 * 3)
        ) / 10;


        // Verificação da situação

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
                <strong>Aluno:</strong>
                <?= htmlspecialchars($nome) ?>
            </p>

            <p>
                <strong>Idade:</strong>
                <?= $idade ?> anos
            </p>

            <p>
                <strong>Nota 1:</strong>
                <?= number_format($nota1, 1, ',', '.') ?>
            </p>

            <p>
                <strong>Nota 2:</strong>
                <?= number_format($nota2, 1, ',', '.') ?>
            </p>

            <p>
                <strong>Nota 3:</strong>
                <?= number_format($nota3, 1, ',', '.') ?>
            </p>

            <p>
                <strong>Nota 4:</strong>
                <?= number_format($nota4, 1, ',', '.') ?>
            </p>

            <p>
                <strong>Nota 5:</strong>
                <?= number_format($nota5, 1, ',', '.') ?>
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

        <a href="idade.php">
            Verificar idade
        </a>

        <a href="notas.php">
            Página de notas
        </a>

    </div>

</div>

</body>
</html>