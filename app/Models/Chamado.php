    <?php

        class Chamado{

             // READ - Ler todos os chamados
    public function lerChamados(){
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
    public function salvarChamados($chamados){
        $arquivo = __DIR__ . "/../dados/chamados.json";

    return file_put_contents(
        $arquivo, json_encode($chamados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
    ) !== false;
}

    // CREATE - Cadastrar chamados
    public function cadastrarChamados($nome, $setor, $equipamento, $descricao, $prioridade){
        if (trim($nome) === "" || trim($descricao) == ""){ // trim tira os espaços do inicio e do final
            return false;
        }
        
        $chamados = $this->lerChamados();
        $novoChamado = [
            "nome" => trim($nome),
            "setor" => $setor,
            "equipamento" => $equipamento,
            "descricao" => trim($descricao),
            "prioridade" => $prioridade,
            "status" => "Aberto"
        ];
        $chamados[] =  $novoChamado;

        return $this-> salvarChamados($chamados);

}

//UPDATE - Atualizar os status do chamado
    public function atualizarChamado($posicao, $novoStatus){
        $chamados = $this-> lerChamados();

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
            return $this-> salvarChamados ($chamados);
        }
}

// DELETE - Deletar chamados
    public function excluirChamado($posicao){
        $chamados = $this->lerChamados();
        
        if (!isset($chamados[$posicao])){
            return false;
        }

        unset($chamados[$posicao]);

        $chamados = array_values($chamados);

        return $this -> salvarChamados($chamados);

}

//Relatório de atendimentos
    public function gerarRelatorio(){
        $chamados = $this->lerChamados();

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
        }
    ?>