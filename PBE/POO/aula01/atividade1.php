<?php

//CLASS1

class celular {
    public $modelo; //atributo
    public $cor; //atributo
    public $marca; //atributo
    public $duraçãobateria; //atributo
    public $potencia; //atributo

    public function pesquisar() { //Método

        return "Você fez uma pesquisa com o celular com a potência " .$this->potencia;

    }


    public function ligações() { //Método

        return "Você realizou uma ligação com o celular da cor" .$this->cor;

    }
    public function fotografar() { //Método

        return "Você fotografou com o celular da marca" .$this->marca;

    }
    
        
    
}

$iphone13 = new celular();
$iphone13->cor = "Branco"
echo $iphone13->ligações();

$motog22 = new celular();
$motog22->potencia = "Mediana"
echo $motog22->pesquisar();

$GalaxyS24 = new celular();
$GalaxyS24->marca = "Samsung"
echo $GalaxyS24->fotografar();

//CLASS2

class camiseta {
    public $marca; //atributo
    public $cor; //atributo
    public $tamanho; //atributo
    public $modelo; //atributo
    public $material; //atributo

    public function usar() { //Método

        return "Você usou uma camiseta da marca" .$this->marca;

    }


    public function vestir() { //Método

        return "Você vestiu uma camiseta feita de" .$this->material;

    }
    public function lavar() { //Método

        return "Você lavou uma camiseta" .$this->modelo;

    }
    
        
    
}

$polo = new camiseta();
$polo->marca = "lacoste";
echo $polo->usar();

$oversize = new camiseta();
$oversize->material = "algodão";
echo $oversize->vestir();

$slim = new camiseta();
$slim->modelo = "básica";
echo $slim->lavar();

//CLASS3

class moto {
    public $marca; //atributo
    public $cor; //atributo
    public $velocidademaxima; //atributo
    public $modelo; //atributo
    public $cilindrada; //atributo

    public function viajar() { //Método
        return "Você ira viajar com uma moto da marca " . $this->marca;
    }

    public function passear() { //Método
        return "Sua moto de passeio chega a " . $this->velocidademaxima;
    }

    public function manobras() { //Método
        return "Você comprou uma moto de manobras na cor " . $this->cor;
    }
}

$moto1 = new moto();
$moto1->marca = "Yamaha";
echo $moto1->viajar();

$moto2 = new moto();
$moto2->velocidademaxima = "180 km/h";
echo $moto2->passear();

$moto3 = new moto();
$moto3->cor = "preta";
echo $moto3->manobras();

//CLASS4

class televisao {
    public $marca; //atributo
    public $tamanhotela; //atributo
    public $volume; //atributo
    public $canalatual; //atributo
    public $ligada; //atributo

    public function ligar() { //Método
        return "a TV está ligada " . $this->ligada;
    }

    public function trocarcanal() { //Método
        return "Seu canal atual é " . $this->canalatual;
    }

    public function aumentarvolume() { //Método
        return "Você alterou o volume para " . $this->volume;
    }
}

$tv1 = new televisao();
$tv1->ligada = "sim";
echo $tv1->ligar();

$tv2 = new televisao();
$tv2->canalatual = 12;
echo $tv2->trocarcanal();

$tv3 = new televisao();
$tv3->volume = 25;
echo $tv3->aumentarvolume();

//CLASS5

class relogio {
    public $marca; //atributo
    public $tipo; //atributo
    public $horarioatual; //atributo
    public $material; //atributo
    public $resistenteagua; //atributo

    public function mostrarhora() { //Método
        return "O horario atual é " . $this->horarioatual;
    }

    public function alarme() { //Método
        return "Você alterou o alarme do seu relogio do tipo " . $this->tipo;
    }

    public function ajustarhora() { //Método
        return "Você ajustou a hora do relogio da marca " . $this->marca;
    }
}

$relogio1 = new relogio();
$relogio1->horarioatual = "14:30";
echo $relogio1->mostrarhora();

$relogio2 = new relogio();
$relogio2->tipo = "digital";
echo $relogio2->alarme();

$relogio3 = new relogio();
$relogio3->marca = "Casio";
echo $relogio3->ajustarhora();


?>