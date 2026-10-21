<?php
require_once "helpdesk-func.php";

$mensagem = "";

// Identificar a operação solicitada
if ($_SERVER["REQUEST_METHOD" == "POST"]) {
    $ACAO = $_POST["acao"] ?? "";

if ($acao === "cadastrar") {
    $sucesso = cadastrarChamados(
        $_POST["nome"] ?? "",
        $_POST["setor"] ?? "",
        $_POST["equipamento"] ?? "",
        $_POST["descricao"] ?? "",
        $_POST["prioridade"] ?? "",
    );

    $mensagem = $sucesso ? "Chamado cadastrado com sucesso" : "Erro ao cadastrar. Verifique os dados.";
}

if ($acao === "atualizar"){
    $sucesso = atualizarChamado(
        (int) ($_POST["posicao"] ?? -1),
        $_POST["status"] ?? ""
    );

    $mensagem = $sucesso ? "Status atualizado!" : "Não foi possível atualizar."; 
}

if($acao === "excluir"){
    $sucesso = excluirChamado((int) ($_POST["posicao"] ?? -1));

    $mensagem = $sucesso ? "Chamado excluído!" : "Não foi possível excluir.";
}
}

$chamados = lerChamados();
$relatorio = gerarRelatorio();

//Evita exibie HTMLN enviado pelo usuário
function escapar($valor){
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Sistema Helpdesk</title>
</head>

<body>

    <h1>Sistema de Gerenciamento de Chamados</h1>

    <?php if (isset($mensagem)) { ?>
        <p>
            <?= htmlspecialchars($mensagem, ENT_QUOTES, "UTF-8") ?>
        </p>
    <?php } ?>

    <h2>ABERTURA DE CHAMADOS</h2>

    <form method="POST">

        <label>Nome do funcionário:</label>
        <input type="text" name="nome" required>

        <br><br>

        <label>Setor:</label>
        <select name="setor" required>
            <option value="">Selecione</option>
            <option value="Produção">Produção</option>
            <option value="Administrativo">Administrativo</option>
            <option value="Logística">Logística</option>
            <option value="Financeiro">Financeiro</option>
            <option value="TI">TI</option>
        </select>

        <br><br>

        <label>Equipamento afetado:</label>
        <select name="equipamento" required>
            <option value="">Selecione</option>
            <option value="Computador">Computador</option>
            <option value="Impressora">Impressora</option>
            <option value="Rede">Rede</option>
            <option value="Sistema">Sistema</option>
            <option value="Outro">Outro</option>
        </select>

        <br><br>

        <label>Descrição do problema:</label>
        <br>
        <textarea name="descricao" required></textarea>

        <br><br>

        <label>Prioridade:</label>
        <select name="prioridade" required>
            <option value="">Selecione</option>
            <option value="Baixa">Baixa</option>
            <option value="Média">Média</option>
            <option value="Alta">Alta</option>
        </select>

        <br><br>

        <button type="submit" name="acao" value="cadastrar">
            Cadastrar chamado
        </button>