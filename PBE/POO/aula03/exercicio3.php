<?php

class Fabricante {
    public $nome;
    public $paisOrigem;

    public function __construct($nome, $paisOrigem) {
        $this->nome = $nome;
        $this->paisOrigem = $paisOrigem;
    }
}

class Motor {
    public $tipo;
    public $potencia;

    public function __construct($tipo, $potencia) {
        $this->tipo = $tipo;
        $this->potencia = $potencia;
    }
}

class Carro {
    public $modelo;
    public $ano;
    public $fabricante; 
    public $motor; 

    public function __construct($modelo, $ano, Fabricante $fabricante, Motor $motor) {
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->fabricante = $fabricante;
        $this->motor = $motor;
    }
}

$fabricante1 = new Fabricante("Toyota", "Japão");
$motor1 = new Motor("V6", 300);
$carro1 = new Carro("Corolla", 2020, $fabricante1, $motor1);
echo "Modelo: " . $carro1->modelo . "<br>";
echo "Ano: " . $carro1->ano . "<br>";
echo "Fabricante: " . $carro1->fabricante->nome . " | País: " . $carro1->fabricante->paisOrigem . "<br>";
echo "Motor: " . $carro1->motor->tipo . " | Potência: " . $carro1->motor->potencia . " cv";