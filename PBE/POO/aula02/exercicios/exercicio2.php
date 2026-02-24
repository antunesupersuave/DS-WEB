<?php

abstract class Animal {
    abstract public function fazerSom();
    
    public function mover() {
        return "Se move";
    }
}

class Sapo extends Animal {
    public function fazerSom() {
        return "Coaxa";
    }
}

class Cavalo extends Animal {
    public function fazerSom() {
        return "Relincha";
    }
    
    public function mover() {
        return parent::mover() . " - Galopa e anda";
    }
}

class Tartaruga extends Animal {
    public function fazerSom() {
        return "Grune";
    }
}

$sapo = new Sapo();
$cavalo = new Cavalo();
$tartaruga = new Tartaruga();

echo "Sons dos Animais" . "<br>";
echo "Sapo: " . $sapo->fazerSom() . "<br>";
echo "Cavalo: " . $cavalo->fazerSom() . "<br>";
echo "Tartaruga: " . $tartaruga->fazerSom() . "<br>";

echo "Movimentos dos Animais" . "<br>";
echo "Sapo: " . $sapo->mover() . "<br>";
echo "Cavalo: " . $cavalo->mover() . "<br>";
echo "Tartaruga: " . $tartaruga->mover() . "<br>";