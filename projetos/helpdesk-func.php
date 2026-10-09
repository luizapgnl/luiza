
<?php

function lerChamados(): array
{
    $arquivo = __DIR__ . '/chamados.json';

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, '[]');
    }

    $conteudo = file_get_contents($arquivo);
    $chamados = json_decode($conteudo, true);

    return is_array($chamados) ? $chamados : [];
}

function salvarChamados(array $chamados): bool
{
    $arquivo = __DIR__ . '/chamados.json';

    $json = json_encode(
        $chamados,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    if ($json === false) {
        return false;
    }

    return file_put_contents($arquivo, $json, LOCK_EX) !== false;
}

function cadastrarChamado(
    string $nome,
    string $setor,
    string $equipamento,
    string $descricao,
    string $prioridade
): bool {
    $nome = trim($nome);
    $descricao = trim($descricao);

    $setores = [
        'Produção',
        'Administrativo',
        'Logística',
        'Financeiro',
        'TI'
    ];

    $equipamentos = [
        'Computador',
        'Impressora',
        'Rede',
        'Sistema',
        'Outro'
    ];

    $prioridades = ['Baixa', 'Média', 'Alta'];

    if (
        $nome === '' ||
        $descricao === '' ||
        !in_array($setor, $setores, true) ||
        !in_array($equipamento, $equipamentos, true) ||
        !in_array($prioridade, $prioridades, true)
    ) {
        return false;
    }

    $chamados = lerChamados();

    $chamados[] = [
        'nome' => $nome,
        'setor' => $setor,
        'equipamento' => $equipamento,
        'descricao' => $descricao,
        'prioridade' => $prioridade,
        'status' => 'Aberto'
    ];

    return salvarChamados($chamados);
}

function listarChamados(): array
{
    return lerChamados();
}

function atualizarChamado(int $id, string $status): bool
{
    $statusPermitidos = [
        'Aberto',
        'Em andamento',
        'Resolvido'
    ];

    if (!in_array($status, $statusPermitidos, true) || $id < 0) {
        return false;
    }

    $chamados = lerChamados();

    if (!isset($chamados[$id])) {
        return false;
    }

    $chamados[$id]['status'] = $status;

    return salvarChamados($chamados);
}

function excluirChamado(int $id): bool
{
    if ($id < 0) {
        return false;
    }

    $chamados = lerChamados();

    if (!isset($chamados[$id])) {
        return false;
    }

    unset($chamados[$id]);

    $chamados = array_values($chamados);

    return salvarChamados($chamados);
}

function contarChamados(): array
{
    $chamados = lerChamados();

    $relatorio = [
        'total' => count($chamados),
        'abertos' => 0,
        'em_andamento' => 0,
        'resolvidos' => 0
    ];

    foreach ($chamados as $chamado) {
        if ($chamado['status'] === 'Aberto') {
            $relatorio['abertos']++;
        } elseif ($chamado['status'] === 'Em andamento') {
            $relatorio['em_andamento']++;
        } elseif ($chamado['status'] === 'Resolvido') {
            $relatorio['resolvidos']++;
        }
    }

    return $relatorio;
}