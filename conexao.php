<?php

    $host = "localhost";
    $banco = "ana315";
    $usuario ="ana315";
    $senha = "315!@#";

    // PDO= PHP Data Objects (uma ferramenta do php para conversar com o bando de dados)

try{
    $pdo= new PDO("mysql: host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);

    $pdo->setAttribute(
        // -> SERVE PARA PUXAR ALGO QUE PRENDE AQUELE OBJETO
        // PDO:: ATTR_ERRMODE - É PARA CONFIGURAR O MODO DE ERROS DO PDO
        // PDO:: ERRMODE_EXCEPTION - É PARA QUANDO ACONTECER ALGUM ERRO, TRANSFORMAR EM EXECUÇÃO
        PDO:: ATTR_ERRMODE, 
        PDO:: ERRMODE_EXCEPTION
    );

    echo  "Conectado com sucesso!";

} catch (PDOException $erro){

    echo "Erro ao conectar:".$erro->getMessage();


}