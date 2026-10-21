<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login 2.0</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
<?php

$usuario_correto = "Ana Luluiza";
$senha_correta = "12345";

$mensagem = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_informado = $_POST["usuario"] ?? "";
    $senha_informada = $_POST["senha"] ?? "";

    if ($usuario_informado === $usuario_correto && $senha_informada === $senha_correta) {
        $mensagem = "<p class='sucesso'>Login realizado com sucesso</p>";
    } else {
        $mensagem = "<p class='erro'>Usuário ou senha incorretos</p>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["usuario"])) {
    
    $usuario_informado = $_GET["usuario"] ?? "";
    $senha_informada = $_GET["senha"] ?? "";

    if ($usuario_informado === $usuario_correto && $senha_informada === $senha_correta) {
        $mensagem = "<p class='sucesso'>Login realizado com sucesso (via GET)</p>";
    } else {
        $mensagem = "<p class='erro'>Usuário ou senha incorretos</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Login</title>
    <style>
        .sucesso { color: green; font-weight: bold; }
        .erro { color: red; font-weight: bold; }
        .form-container { margin: 20px; font-family: Arial, sans-serif; }
    </style>
</head>
<body>

    <div class="form-container">
        
        <form id="form-login" action="" method="post">
            <label for="usuario">Usuário:</label><br>
            <input type="text" id="usuario" name="usuario" required><br><br>

            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required><br><br>

            <button type="submit" class="btn-entrar">Entrar</button>
        </form>

        <?php echo $mensagem; ?>
    </div>

</body>
</html>

<?php

?>
</body>
</ht