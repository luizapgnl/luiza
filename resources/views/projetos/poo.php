<?php

// Exemplo SEM POO
//ENCAPSULAMENTO
//Proteger informações para que não sejam alteradas de qualquer jeito.
//HERANÇA
//Criar uma classe nova aproveitando características de outra.
//POLIMORFISMO
//Permitir que objetos diferentes respondam à mesma ação de maneiras diferentes.
//ABSTRAÇÃO
//Mostrar o que é necessário e esconder detalhes complicados de funcionamento.
$nome = "Luli";
$vida = 100;
$dano - 10;

$nome = "Hellvig";
$vida = 160;
$dano - 15;

$nome = "Leleco";
$vida = 50;
$dano - 99;

function atacar($nome) {
    echo "$nome realizou um ataque!";
}

atacar($nome);


// Exemplo COM POO
class Personagem {
    public $nome;
    public $vida;
    public $dano;

    public function __construct($nome, $vida, $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }
        
    public function atacar() {
        echo "$this->nome realizou um ataque!";
    }
}

$Luli = new Personagem("Luli", 100, 10);
$Hellvig = new Personagem("Hellvig", 160, 15);
$Leleco = new Personagem("Leleco", 50, 99);

$Luli->atacar();

class Guerreiro extends Personagem{
    public function defender(){
        echo "$this-> nome levantou o escudo!";
    }
}
$guerreiro = new Guerreiro("Luli", 100, 10);

$guerreiro->atacar(); //método herdado
$guerreiro->defender(); //método próprio


//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem()?
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe
?>