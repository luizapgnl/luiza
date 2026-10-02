<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Idade</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <?php
    $nome = $_POST['nome'] ?? '';
    $idade = $_POST['idade'] ?? null;
    
    $resultado = ($nome !== '' && $idade !== null) ? "{$nome} - {$idade} anos" : '';
    ?>

    <h1>Verificador de Idade</h1>
    <p class="subtitulo">Preencha os dados abaixo para consultar</p>

    <form method="POST" action="">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>" placeholder="Digite seu nome" required>
        </div>
        
        <div>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" value="<?= htmlspecialchars($idade ?? '') ?>" placeholder="Digite sua idade" required>
        </div>

        <div>
            <label for="resultado">Resultado:</label>
            <input type="text" id="resultado" name="resultado" value="<?= htmlspecialchars($resultado) ?>" readonly placeholder="O resultado aparecerá aqui">
        </div>

        <button type="submit">Enviar</button>
    </form>

    <?php if ($nome !== '' && $idade !== null): ?>
        <div class="resultado" style="margin-top: 20px;">
            <p><strong>Nome:</strong> <?= ucfirst(htmlspecialchars($nome)) ?></p>
            <p><strong>Idade:</strong> <?= (int)$idade ?> anos</p>
            <p>
                <strong>Status:</strong> 
                <?php if ((int)$idade >= 18): ?>
                    <span class="aprovado">Maior de idade</span>
                <?php else: ?>
                    <span class="reprovado">Menor de idade</span>
                <?php endif; ?>
            </p>
        </div>
    <?php endif; ?>

    <a href="index.php" class="btn-menu">← Voltar ao Menu</a>
</div>

</body>
</html>