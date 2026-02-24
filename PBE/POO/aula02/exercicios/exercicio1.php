<?php

class Pessoa {
    public $nome;
    public $idade;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getIdade() {
        return $this->idade;
    }
}

abstract class Funcionario extends Pessoa {
    protected $salario;

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }

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
$gerente->setNome("Carlos");
$gerente->setIdade(40);
$gerente->setSalario(10000);

$dev = new Desenvolvedor();
$dev->setNome("Ana");
$dev->setIdade(28);
$dev->setSalario(5000);

echo $gerente->getNome() . " - Bônus: R$ " . $gerente->calcularBonus();
echo "<br>";
echo $dev->getNome() . " - Bônus: R$ " . $dev->calcularBonus();

?>