<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi haters</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
    <?php
    echo "<h1> Hi haters </h1>";

    $nome = $_POST['nome'] ?? '';
    $idade = $_POST['idade'] ?? null;
    
    
    $resultado = ($nome !== '' && $idade !== null) ? "{$nome} - {$idade} anos" : '';
    ?>

    <form method="POST" action="">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>" required>
        </div>
        
        <div>
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" value="<?= htmlspecialchars($idade ?? '') ?>" required>
        </div>

        <div>
            <label for="resultado">Resultado:</label>
            <input type="text" id="resultado" name="resultado" value="<?= htmlspecialchars($resultado) ?>" readonly>
        </div>

        <button type="submit">Enviar</button>
    </form>

    <hr>
    
    <?php if ($nome !== '' && $idade !== null): ?>
        <h1>Nome: <?= ucfirst(htmlspecialchars($nome)) ?></h1>
        <p>Idade: <?= (int)$idade ?></p>

        <p>
            Status: 
            <?php if ((int)$idade >= 18): ?>
                <strong style="color: green;">Maior de idade</strong>
            <?php else: ?>
                <strong style="color: red;">Menor de idade</strong>
            <?php endif; ?>
        </p>
    <?php endif; ?>
    
</div>

</body>
</html>