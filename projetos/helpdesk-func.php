<?php
{
    return __DIR__ . "/chamados.json";
}
function listarChamados()
{
    $caminho = caminhoArquivo();

    if (!file_exists($caminho)) {
        file_put_contents($caminho, "[]");
    }

    $json = file_get_contents($caminho);

    // 3. TRANSFORMAR JSON EM ARRAY PHP
    $chamados = json_decode($json, true);

    if (!is_array($chamados)) {
        return [];
    }
    
    return $chamados;
}

fuction cadastrarChamado($nome, $setor, $equipamento, $descricao, $prioridade)
{
   if(
    trim($nome) == "" ||
    trim($descricao) == "" ||
    !in_array($setor, ["Produção", "Administrativo", "Logistica", "Impressora", "Rede", "Sistema", "Outro"]) ||
    !in_array()
    ) 
}