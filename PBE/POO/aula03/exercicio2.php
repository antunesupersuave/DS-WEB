<?php

class Artista {
    public $nome;
    public $generoMusical;

    public function __construct($nome, $generoMusical) {
        $this->nome = $nome;
        $this->generoMusical = $generoMusical;
    }
}

class Musica {
    public $titulo;
    public $duracao;
    public $artista; 

    public function __construct($titulo, $duracao, Artista $artista) {
        $this->titulo = $titulo;
        $this->duracao = $duracao;
        $this->artista = $artista;
    }
}

$artista1 = new Artista("Mc Kevin", "Funk/LoveSong");
$musica1 = new Musica("Nosso Lugar", 4.3, $artista1);
echo "Título: " . $musica1->titulo . "<br>";
echo "Duração: " . $musica1->duracao . " minutos<br>";
echo "Artista: " . $musica1->artista->nome . " | Gênero: " . $musica1->artista->generoMusical;
?>