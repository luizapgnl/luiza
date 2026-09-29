<?php
session_start();


$pdo = null;
$erro_banco = null;

try {
    if (file_exists('conexao.php')) {
        require_once 'conexao.php';
    } else {
        $erro_banco = "O arquivo 'conexao.php' não foi encontrado.";
    }
} catch (Exception $e) {
    $erro_banco = "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'jogo';


if ($pagina === 'jogo') {
    $mensagem_jogo = "";

   
    if (!isset($_SESSION['numero_secreto']) || isset($_GET['reiniciar'])) {
        $_SESSION['numero_secreto'] = rand(1, 100);
        $_SESSION['tentativas'] = 0;
        $mensagem_jogo = "Jogo iniciado! Tente adivinhar o número entre 1 e 100.";
    }

    // Processa o palpite enviado via POST
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['chute'])) {
        $chute = (int)$_POST['chute'];
        $_SESSION['tentativas']++;

        if ($chute === $_SESSION['numero_secreto']) {
            $mensagem_jogo = "🎉 Parabéns! Você acertou o número " . $_SESSION['numero_secreto'] . " em " . $_SESSION['tentativas'] . " tentativas!";
        } elseif ($chute < $_SESSION['numero_secreto']) {
            $mensagem_jogo = "📈 Tente um número MAIOR!";
        } else {
            $mensagem_jogo = "📉 Tente um número MENOR!";
        }
    }
}


if ($pagina === 'cadastro') {
    $mensagem_cadastro = "";

    if ($erro_banco) {
        $mensagem_cadastro = "<span style='color: red;'>⚠️ $erro_banco</span>";
    } else if ($pdo) {
        try {
            $sqlCriarTabela = "CREATE TABLE IF NOT EXISTS jogos (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                genero VARCHAR(50) NOT NULL,
                nota INT NOT NULL,
                ano_lancamento INT NOT NULL
            )";
            $pdo->exec($sqlCriarTabela);

            
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cadastrar_jogo'])) {
                $nome = trim($_POST["nome"]);
                $genero = trim($_POST["genero"]);
                $nota = (int)$_POST["nota"];
                $ano_lancamento = (int)$_POST["ano_lancamento"];

                if (!empty($nome) && !empty($genero)) {
                    $stmt = $pdo->prepare("INSERT INTO jogos (nome, genero, nota, ano_lancamento) VALUES (:nome, :genero, :nota, :ano)");
                    $stmt->execute([
                        ':nome'   => $nome,
                        ':genero' => $genero,
                        ':nota'   => $nota,
                        ':ano'    => $ano_lancamento
                    ]);

                    $mensagem_cadastro = "<span style='color: green; font-weight: bold;'>✅ Jogo cadastrado com sucesso!</span>";
                } else {
                    $mensagem_cadastro = "<span style='color: red;'>Por favor, preencha todos os campos.</span>";
                }
            }
        } catch (PDOException $e) {
            $mensagem_cadastro = "<span style='color: red;'>Erro no banco de dados: " . htmlspecialchars($e->getMessage()) . "</span>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Jogos</title>
    <link rel="stylesheet" href="style.css">
    <style>
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <nav>
        <a href="index.php?pagina=jogo">🎮 Jogo da Adivinhação</a> | 
        <a href="index.php?pagina=cadastro">📝 Cadastrar Novo Jogo</a>
    </nav>

    <hr>

    <?php if ($pagina === 'jogo'): ?>
        <h2>🎮 Jogo da Adivinhação (1 a 100)</h2>
        <p><strong><?php echo htmlspecialchars($mensagem_jogo); ?></strong></p>

        <form method="POST" action="index.php?pagina=jogo">
            <label for="chute">Seu Palpite:</label>
            <input type="number" id="chute" name="chute" min="1" max="100" required autofocus>
            <button type="submit">Chutar</button>
        </form>

        <br>
        <a href="index.php?pagina=jogo&reiniciar=1">Reiniciar Jogo</a>

    <?php elseif ($pagina === 'cadastro'): ?>
        <h2>📝 Cadastrar Jogo no Banco de Dados</h2>

        <?php if (!empty($mensagem_cadastro)): ?>
            <p><?php echo $mensagem_cadastro; ?></p>
        <?php endif; ?>

        <form action="index.php?pagina=cadastro" method="POST">
            <input type="hidden" name="cadastrar_jogo" value="1">
            <div>
                <label for="nome">Nome do Jogo:</label><br>
                <input type="text" id="nome" name="nome" required>
            </div>
            <br>
            <div>
                <label for="genero">Gênero:</label><br>
                <input type="text" id="genero" name="genero" required>
            </div>
            <br>
            <div>
                <label for="nota">Nota (0 a 10):</label><br>
                <input type="number" id="nota" name="nota" min="0" max="10" required>
            </div>
            <br>
            <div>
                <label for="ano_lancamento">Ano de Lançamento:</label><br>
                <input type="number" id="ano_lancamento" name="ano_lancamento" min="1950" max="2030" required>
            </div>
            <br>
            <button type="submit">Cadastrar</button>
        </form>
    <?php endif; ?>

</body>
</html>