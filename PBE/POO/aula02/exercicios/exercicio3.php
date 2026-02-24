<?php

class Veiculo {
    public $marca;
    public $modelo;
    private $velocidade;

    // Velocidade
    public function setVelocidade($velocidade) {
        $this->velocidade = $velocidade;
    }

    // Get da velocidade
    public function getVelocidade() {
        return $this->velocidade;
    }

    public function mostrarDados() {
        echo "Marca: " . $this->marca . "<br>";
        echo "Modelo: " . $this->modelo . "<br>";
        echo "Velocidade: " . $this->velocidade . " km/h<br>";
    }
}

// Classe Carro
class Carro extends Veiculo {

    public function acelerar() {
        
        $novaVelocidade = $this->getVelocidade() + 20;
        $this->setVelocidade($novaVelocidade);
    }
}

// Classe Moto
class Moto extends Veiculo {

    public function acelerar() {
        $novaVelocidade = $this->getVelocidade() + 30;
        $this->setVelocidade($novaVelocidade);
    }
}

$carro = new Carro();
$carro->marca = "Toyota";
$carro->modelo = "Corolla";
$carro->setVelocidade(0);
$carro->acelerar();

echo "<h3>Carro</h3>";
$carro->mostrarDados();

echo "<br>";

$moto = new Moto();
$moto->marca = "Honda";
$moto->modelo = "CB 500";
$moto->setVelocidade(0);
$moto->acelerar();

echo "<h3>Moto</h3>";
$moto->mostrarDados();

?>