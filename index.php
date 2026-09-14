<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hi haters</title>
</head>
<body>

<?php
echo "<h1> Hi haters </h1>";

$nome = "luiza";
$idade = 17; 
?>

<h1>Nome: <?= $nome ?></h1>
<p>Idade: <?= $idade ?></p>

<p>
    Status: 
    <?php if ($idade >= 18): ?>
        <strong style="color: pink;">Maior de idade</strong>
    <?php else: ?>
        <strong style="color: red;">Menor de idade</strong>
    <?php endif; ?>
</p>

</body>
</html>