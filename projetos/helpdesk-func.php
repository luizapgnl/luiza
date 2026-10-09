<?php
require_once 'helpdesk-func.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';

    if ($acao === 'cadastrar') {
        $nome = trim($_POST['nome'] ?? '');
        $setor = $_POST['setor'] ?? '';
        $equipamento = $_POST['equipamento'] ?? '';
        $descricao = trim($_POST['descricao'] ?? '');
        $prioridade = $_POST['prioridade'] ?? '';

        if ($nome === '' || $descricao === '') {
            $mensagem = 'Preencha o nome do solicitante e a descrição do problema.';
        } else {
            $resultado = cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade);
            $mensagem = $resultado ? 'Chamado cadastrado com sucesso.' : 'Não foi possível cadastrar o chamado.';
        }
    } elseif ($acao === 'atualizar') {
        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);
        $status = $_POST['status'] ?? '';

        if ($id === false || $id === null || !atualizarChamado($id, $status)) {
            $mensagem = 'Não foi possível atualizar o chamado.';
        } else {
            $mensagem = 'Status atualizado com sucesso.';
        }
    } elseif ($acao === 'excluir') {
        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT);

        if ($id === false || $id === null || !excluirChamado($id)) {
            $mensagem = 'Não foi possível excluir o chamado.';
        } else {
            $mensagem = 'Chamado excluído com sucesso.';
        }
    }
}

$chamados = listarChamados();
$relatorio = contarChamados();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Helpdesk</title>
</head>
<body>
    <h1>Sistema de Gerenciamento de Chamados</h1>
    <link rel="stylesheet" href="/css/help.css">

    <?php if ($mensagem !== ''): ?>
        <p><?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <h2>Novo Chamado</h2>

    <form method="POST">
        <input type="hidden" name="acao" value="cadastrar">

        <label for="nome">Nome do solicitante:</label>
        <input type="text" id="nome" name="nome" required>
        <br><br>

        <label for="setor">Setor:</label>
        <select id="setor" name="setor" required>
            <option value="Produção">Produção</option>
            <option value="Administrativo">Administrativo</option>
            <option value="Logística">Logística</option>
            <option value="Financeiro">Financeiro</option>
            <option value="TI">TI</option>
        </select>
        <br><br>

        <label for="equipamento">Equipamento:</label>
        <select id="equipamento" name="equipamento" required>
            <option value="Computador">Computador</option>
            <option value="Impressora">Impressora</option>
            <option value="Rede">Rede</option>
            <option value="Sistema">Sistema</option>
            <option value="Outro">Outro</option>
        </select>
        <br><br>

        <label for="descricao">Descrição do problema:</label>
        <br>
        <textarea id="descricao" name="descricao" required></textarea>
        <br><br>

        <label for="prioridade">Prioridade:</label>
        <select id="prioridade" name="prioridade" required>
            <option value="Baixa">Baixa</option>
            <option value="Média">Média</option>
            <option value="Alta">Alta</option>
        </select>
        <br><br>

        <button type="submit">Cadastrar Chamado</button>
    </form>

    <h2>Relatório de Atendimentos</h2>

    <p>Total de chamados: <?= $relatorio['total'] ?></p>
    <p>Chamados abertos: <?= $relatorio['abertos'] ?></p>
    <p>Chamados em andamento: <?= $relatorio['em_andamento'] ?></p>
    <p>Chamados resolvidos: <?= $relatorio['resolvidos'] ?></p>

    <h2>Lista de Chamados</h2>

    <?php if (empty($chamados)): ?>
        <p>Nenhum chamado cadastrado.</p>
    <?php else: ?>
        <?php foreach ($chamados as $id => $chamado): ?>
            <hr>

            <h3>Chamado Nº <?= $id + 1 ?></h3>

            <p><strong>Solicitante:</strong> <?= htmlspecialchars($chamado['nome'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Setor:</strong> <?= htmlspecialchars($chamado['setor'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Equipamento:</strong> <?= htmlspecialchars($chamado['equipamento'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Descrição:</strong> <?= nl2br(htmlspecialchars($chamado['descricao'], ENT_QUOTES, 'UTF-8')) ?></p>
            <p><strong>Prioridade:</strong> <?= htmlspecialchars($chamado['prioridade'], ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($chamado['status'], ENT_QUOTES, 'UTF-8') ?></p>

            <form method="POST">
                <input type="hidden" name="acao" value="atualizar">
                <input type="hidden" name="id" value="<?= $id ?>">

                <label for="status-<?= $id ?>">Atualizar status:</label>
                <select id="status-<?= $id ?>" name="status" required>
                    <option value="Aberto" <?= $chamado['status'] === 'Aberto' ? 'selected' : '' ?>>Aberto</option>
                    <option value="Em andamento" <?= $chamado['status'] === 'Em andamento' ? 'selected' : '' ?>>Em andamento</option>
                    <option value="Resolvido" <?= $chamado['status'] === 'Resolvido' ? 'selected' : '' ?>>Resolvido</option>
                </select>

                <button type="submit">Atualizar</button>
            </form>

            <form method="POST">
                <input type="hidden" name="acao" value="excluir">
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit">Excluir Chamado</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>