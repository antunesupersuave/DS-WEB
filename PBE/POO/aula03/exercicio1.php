<?php

class Dono {
    public $nome;
    public $telefone;

    public function __construct($nome, $telefone) {
        $this->nome = $nome;
        $this->telefone = $telefone;
    }
}

class Animal {
    public $nome;
    public $especie;
    public $dono; 

   
    public function __construct($nome, $especie, Dono $dono) {
        $this->nome = $nome;
        $this->especie = $especie;
        $this->dono = $dono;
    }
}

$dono1 = new Dono("Pedro", "(15) 99827-4633");

$animal1 = new Animal("Bruce", "Cachorro", $dono1);

echo $animal1->nome . " | " . $animal1->especie . "<br>";
echo "Dono: " . $animal1->dono->nome . " | Tel: " . $animal1->dono->telefone;

?>