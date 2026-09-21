<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Idade</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="card">

    <h1>Hi Haters</h1>

    <form method="POST" action="idade.php">

        <div>
            <label for="nome">Nome:</label>
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

        <button type="submit">Verificar idade</button>

    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nome = trim($_POST["nome"]);
        $idade = (int) $_POST["idade"];

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
                <strong>Status:</strong>

                <?php if ($idade >= 18): ?>

                    <span class="aprovado">
                        Maior de idade
                    </span>

                <?php else: ?>

                    <span class="reprovado">
                        Menor de idade
                    </span>

                <?php endif; ?>

            </p>

        </div>

        <?php
    }
    ?>

    <div class="links">

        <a href="index.php">
            Calcular médias
        </a>

        <a href="notas.php">
            Notas do aluno
        </a>

    </div>

</div>

</body>
</html>
