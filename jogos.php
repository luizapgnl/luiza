<?php
session_start();


if (!isset($_SESSION['numero_secreto']) || isset($_GET['reiniciar'])) {
    $_SESSION['numero_secreto'] = rand(1, 100);
    $_SESSION['tentativas'] = 0;
    $mensagem = "Jogo iniciado! Tente adivinhar o número entre 1 e 100.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['chute'])) {
    $chute = (int)$_POST['chute'];
    $_SESSION['tentativas']++;

    if ($chute == $_SESSION['numero_secreto']) {
        $mensagem = "🎉 Parabéns! Você acertou o número " . $_SESSION['numero_secreto'] . " em " . $_SESSION['tentativas'] . " tentativas!";
    } elseif ($chute < $_SESSION['numero_secreto']) {
        $mensagem = "📈 Tente um número MAIOR!";
    } else {
        $mensagem = "📉 Tente um número MENOR!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Adivinhação em PHP</title>
</head>
<body>

    <h2>🎮 Jogo da Adivinhação (1 a 100)</h2>

    <p><strong><?php echo $mensagem; ?></strong></p>

    <form method="POST" action="jogo.php">
        <label for="chute">Seu Palpite:</label>
        <input type="number" id="chute" name="chute" min="1" max="100" required>
        <button type="submit">Chutar</button>
    </form>

    <br>
    <a href="jogo.php?reiniciar=1">Reiniciar Jogo</a>

</body>
</html>