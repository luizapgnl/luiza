<?php

$caminho = __DIR__ . "/chamados.json";

function consultarChamados() {
    global $caminho;
    $json = file_get_contents($caminho);
    $chamados = json_decode($json, true);
    if (!is_array($chamados)) {
        $chamados = [];
    }
    return $chamados;
}
function salvarChamados($chamados) {
    global $caminho;

    $jsonAtualizado = json_encode(
        $chamados,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );

    file_put_contents($caminho, $jsonAtualizado);
}
function cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade) {
    $chamados = consultarChamados();
    $novoChamado = [
        "nome" => $nome,
        "setor" => $setor,
        "equipamento" => $equipamento,
        "descricao" => $descricao,
        "prioridade" => $prioridade,
        "status" => "Aberto"
    ];
    $chamados[] = $novoChamado;
    salvarChamados($chamados);
}

function atualizarChamado($posicao, $novoStatus) {

    $chamados = consultarChamados();
    $statusPermitidos = [
        "Aberto",
        "Em andamento",
        "Resolvido"];

    if (
        isset($chamados[$posicao]) &&
        in_array($novoStatus, $statusPermitidos)
    ) {
        $chamados[$posicao]["status"] = $novoStatus;
        salvarChamados($chamados);
        return true;}
    return false;
}

function excluirChamado($posicao) {

    $chamados = consultarChamados();
    if (isset($chamados[$posicao])) {
        unset($chamados[$posicao]);
        $chamados = array_values($chamados);
        salvarChamados($chamados);

        return true;}
    return false;
}

function gerarRelatorio() {

    $chamados = consultarChamados();
    $total = count($chamados);
    $abertos = 0;
    $andamento = 0;
    $resolvidos = 0;

    foreach ($chamados as $chamado) {
        if ($chamado["status"] == "Aberto") {
            $abertos++; }
        if ($chamado["status"] == "Em andamento") {
            $andamento++;}
        if ($chamado["status"] == "Resolvido") {
            $resolvidos++;}
    }

    return [
        "total" => $total,
        "abertos" => $abertos,
        "andamento" => $andamento,
        "resolvidos" => $resolvidos];
}
?>