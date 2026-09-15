<!DOCTYPE html>
<html lang="PT-br">
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
    $resultado = $_POST['idade' + 'nome'] ??;
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
            <input type="number" id="idade" name="idade" value="<?= htmlspecialchars($idade ?? '') ?>" required>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>" required>
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
                <strong style="color: pink;">Maior de idade</strong>
            <?php else: ?>
                <strong style="color: red;">Menor de idade</strong>
            <?php endif; ?>
        </p>
    <?php endif; ?>
    
</div>

</body>
</html>