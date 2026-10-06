<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas do Aluno</title>
  
    <link rel="stylesheet" href="/css/notas.css">
</head>

<body>

<div class="card">

    <h1>Notas do Aluno</h1>
    <p class="subtitulo">Preencha os dados para calcular a média ponderada</p>

    
    <form method="GET" action="">
        <div>
            <label for="nome">Nome do aluno:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                placeholder="Digite o nome"
                required
                value="<?= htmlspecialchars($_GET['nome'] ?? '') ?>"
            >
        </div>

        <div>
            <label for="idade">Idade:</label>
            <input
                type="number"
                id="idade"
                name="idade"
                min="0"
                placeholder="Digite a idade"
                required
                value="<?= htmlspecialchars($_GET['idade'] ?? '') ?>"
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
                placeholder="0.0 a 10.0"
                required
                value="<?= htmlspecialchars($_GET['nota1'] ?? '') ?>"
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
                placeholder="0.0 a 10.0"
                required
                value="<?= htmlspecialchars($_GET['nota2'] ?? '') ?>"
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
                placeholder="0.0 a 10.0"
                required
                value="<?= htmlspecialchars($_GET['nota3'] ?? '') ?>"
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
                placeholder="0.0 a 10.0"
                required
                value="<?= htmlspecialchars($_GET['nota4'] ?? '') ?>"
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
                placeholder="0.0 a 10.0"
                required
                value="<?= htmlspecialchars($_GET['nota5'] ?? '') ?>"
            >
        </div>

        <button type="submit">
            Calcular média
        </button>

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["nome"])) {
        $nome = trim($_GET["nome"]);
        $idade = (int) $_GET["idade"];
        $nota1 = (float) $_GET["nota1"];
        $nota2 = (float) $_GET["nota2"];
        $nota3 = (float) $_GET["nota3"];
        $nota4 = (float) $_GET["nota4"];
        $nota5 = (float) $_GET["nota5"];

        $media = (
            ($nota1 * 2) +
            ($nota2 * 3) +
            ($nota3 * 1) +
            ($nota4 * 1) +
            ($nota5 * 3)
        ) / 10;

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

        <div class="resultado" style="margin-top: 20px;">
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

    <div class="menu-options" style="margin-top: 15px;">
        <a href="index.php" class="btn-menu">
            ← Voltar ao Menu
        </a>
    </div>

</div>

</body>
</html>