<?php
    // READ - Ler todos os chamados
    function lerChamados(){
        $arquivo = __DIR__ . "/../dados/chamados.json";

        //Verificação se o arquivo .json já existe
        if(!file_exists($arquivo)){
                file_put_contents($arquivo, "[]");
        }

        //Ler o arquivo
        $conteudo = file_get_contents($arquivo);

        // Converter o JSON para ARRAY PHP
        $chamados = json_decode($conteudo, true);
        return is_array($chamados) ? $chamados : []; // forma de resumir um if - if

}

    //Salvar chamados no JSON
    function salvarChamados($chamados){
        $arquivo = __DIR__ . "/../dados/chamados.json";

    return file_put_contents(
        $arquivo, json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    ) !== false;
}

    // CREATE - Cadastrar chamados
    function cadastrarChamados($nome, $setor, $equipamento, $descricao, $prioridade){
        if (trim($nome) === "" || trim($descricao) == ""){ // trim tira os espaços do inicio e do final
            return false;
        }
        
        $chamados = lerChamados();
        $novoChamado = [
            "nome" => trim($nome),
            "setor" => $setor,
            "equipamento" => $equipamento,
            "descricao" => trim($descricao),
            "prioridade" => $prioridade,
            "status" => "Aberto"
        ];
        $chamados[] = $novoChamado;

        return salvarChamados($chamados);

}

//UPDATE - Atualizar os status do chamado
    function atualizarChamado($posicao, $novoStatus){
        $chamados = lerChamados();

        $statusPermitidos = [
            "Aberto",
            "Em andamento",
            "Resolvido"
        ];

        if(!isset($chamados[$posicao])){
            return false;
        }
        if (!in_array($novoStatus, $statusPermitidos, true)){
            return false;

            $chamados[$posicao]["status"] = "Resolvido";
            return salvarChamados ($chamados);
        }
}

// DELETE - Deletar chamados
    function excluirChamado($posicao){
        $chamados = lerChamados();
        
        if (!isset($chamados[$posicao])){
            return false;
        }

        unset($chamados[$posicao]);

        $chamados = array_values($chamados);

        return salvarChamados($chamados);

}

//Relatório de atendimentos
    function gerarRelatorio(){
        $chamados = lerChamados();

        $relatorio = [
            "total" => count($chamados),
            "abertos" => 0,
            "andamento" => 0,
            "resolvidos" => 0
        ];

        foreach ($chamados as $chamado) {
            if ($chamado["status"] == "Aberto"){
                $relatorio["abertos"]++;
        } elseif ($chamado["status"] == "Em andamento"){
            $relatorio["andamento"]++;
        }elseif ($chamado["status"] == "Resolvido"){
            $relatorio["resolvidos"]++;
        }
}

        return $relatorio;

    }
?>