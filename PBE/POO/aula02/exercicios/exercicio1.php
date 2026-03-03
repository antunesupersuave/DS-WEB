<?php

class Pessoa {
    public $nome;
    public $idade;
}

abstract class Funcionario extends Pessoa {
    public $salario;

    abstract public function calcularBonus();
}

class Gerente extends Funcionario {
    public function calcularBonus() {
        return $this->salario * 0.20;
    }
}

class Desenvolvedor extends Funcionario {
    public function calcularBonus() {
        return $this->salario * 0.10;
    }
}

$gerente = new Gerente();
$gerente->nome = "Carlos";
$gerente->idade = 40;
$gerente->salario = 10000;

$dev = new Desenvolvedor();
$dev->nome = "Ana";
$dev->idade = 28;
$dev->salario = 5000;


echo $gerente->nome . " - Bônus: R$ " . $gerente->calcularBonus();
echo "<br>";
echo $dev->nome . " - Bônus: R$ " . $dev->calcularBonus();

?>