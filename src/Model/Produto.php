<?php

namespace Docarley\Comex\Model;

class Produto{
    
    public function __construct(
        private string $nome,
        private float $preco,
        private int $qtdEstoque
    ) {        
    }

    public function getPreco() :float {
        return $this->preco;
    }

    public function setPreco(float $preco) :void {
        $this->preco=$preco;
    }

    public function adicionarProduto(int $qtd):int{
        if ($qtd>0) {
            $this->qtdEstoque += $qtd;
            return $this->qtdEstoque; //estoque atual
        }
        return -1; //erro
    }

    public function removerProduto(int $qtd):int{
        if ($qtd>0 && $qtd<=$this->qtdEstoque) {
            $this->qtdEstoque -= $qtd;
            return $this->qtdEstoque; //estoque atual
        }
        return -1;//erro
    }

    public function exibirValorTotalEmEstoque():float{
        return $this->preco*$this->qtdEstoque;
    }

    public function toString():string {
        return "Produto: {$this->nome}, Preço (R$): {$this->preco} - Qtde em estoque: {$this->qtdEstoque}.";
    }
}