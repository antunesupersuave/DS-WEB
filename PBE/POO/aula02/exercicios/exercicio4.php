<?php

abstract class Produto {
    protected string $nome;
    protected float $preco;
    protected int $estoque;

    public function __construct(string $nome, float $preco, int $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    // getters and setters for encapsulation
    public function getNome(): string { return $this->nome; }
    public function setNome(string $nome): void { $this->nome = $nome; }

    public function getPreco(): float { return $this->preco; }
    public function setPreco(float $preco): void { $this->preco = $preco; }

    public function getEstoque(): int { return $this->estoque; }
    public function setEstoque(int $estoque): void { $this->estoque = $estoque; }

    abstract public function calcularDesconto(): float;
}

class Eletronico extends Produto {
    public function calcularDesconto(): float {
        $desconto = 0.10;
        if ($this->estoque < 5) {
            $desconto += 0.10;
        }
        return $this->preco * (1 - $desconto);
    }
}

class Roupa extends Produto {
    public function calcularDesconto(): float {
        $desconto = 0.20;
        if ($this->estoque < 5) {
            $desconto += 0.10;
        }
        return $this->preco * (1 - $desconto);
    }
}

// instanciando produtos e exibindo valores
$produtos = [
    new Eletronico("Smartphone", 1500.00, 10),
    new Eletronico("Notebook", 3500.00, 3), // estoque baixo
    new Roupa("Camiseta", 80.00, 20),
    new Roupa("Jeans", 200.00, 2),
];

foreach ($produtos as $produto) {
    echo "Produto: " . $produto->getNome() . "\n";
    echo "Preço original: R$ " . number_format($produto->getPreco(), 2, ',', '.') . "\n";
    echo "Estoque: " . $produto->getEstoque() . "\n";
    echo "Preço com desconto: R$ " . number_format($produto->calcularDesconto(), 2, ',', '.') . "\n";
    echo "-----------------------\n";
}