<?php

// ENCAPSULAMENTO
//Proteger informações para que não sejam alteradas de qualquer jeito.

//HERANÇA
//Criar uma classe nova aproveitando características de outra.

//POLIMORFISMO
//Permitir que objetos diferentes respondam à mesma ação de maneiras diferentes.

//ABSTRAÇÃO
//Mostrar o que é necessário e esconder detalhes complicados de funcionamento.

class Personagem {
    public $nome;
    private $vida;
    public $dano;

    public function __construct($nome, $vida, $dano) {
        $this->nome = $nome;
        $this->vida = $vida;
        $this->dano = $dano;
    }

    //GETTER
    public function getVida() {
        return $this->vida;
    }

    //SETTER
    public function setVida($vida) {
        if ($vida < 0) {
            $this->vida = 0;
            echo "A vida não pode ser negativa!\n";
            return;
        }

        $this->vida = $vida;
    }
        
    public function atacar() {
        echo "$this->nome realizou um ataque!";
    }
}

class Guerreiro extends Personagem {

    // Sobrescrevendo o método da classe pai
    public function atacar() {
        echo "$this->nome atacou com uma espada!\n";
    }

    public function defender() {
        echo "$this->nome levantou o escudo!";
    }
}

class Mago extends Personagem {
    // Sobrescrevendo o método da classe pai
    public function atacar() {
        echo "$this->nome lançou uma bola de fogo!\n";
    }
}

$guerreiro = new Guerreiro("leleco", 100, 10);
$mago = new Mago ("alice", 160, 15);
$luli= new Personagem("luli", 100, 10);


//1. O que é uma classe?
//Um molde para criar objetos

//2. O que significa new Personagem()?
//Criar um objeto da classe Personagem

//3. Para que serve $this->nome?
//Acessar o nome do objeto atual

//4. O que significa extends?
//Herdar características e métodos de outra classe
?>