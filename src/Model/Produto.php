<?php

namespace Docarley\Comex\Model;

use InvalidArgumentException;
use Docarley\Comex\Model\EstoqueIndisponivelException;

class Produto{
    
    public function __construct(
        private string $nome,
        private float $preco,
        private int $qtdEstoque
    ) {        
    }

    public function getNome() :string {
        return $this->nome;
    }

    public function setNome(string $nome) :void{
        $this->nome=$nome;
    }
    public function getPreco() :float {
        return $this->preco;
    }

    public function setPreco(float $preco) :void {
        $this->preco=$preco;
    }

    public function adicionarProduto(int $qtd = 1 ):int{ //valor default 1 se nada for passado
        if ($qtd>0) {
            $this->qtdEstoque += $qtd;
            return $this->qtdEstoque; //estoque atual
        } 
        throw new InvalidArgumentException("A quantidade deve ser um número positivo e diferente de zero");       
    }

    public function removerProduto(int $qtd = 1):int{ //valor default 1 se nada for passado
        if ($qtd>0) {
            if ($qtd>$this->qtdEstoque) {
                throw new EstoqueIndisponivelException($this->qtdEstoque,$qtd);                
            }
            $this->qtdEstoque -= $qtd;
            return $this->qtdEstoque; //estoque atual
        }
        throw new InvalidArgumentException("A quantidade deve ser um número positivo e diferente de zero");
    }

    public function exibirValorTotalEmEstoque():float{
        return $this->preco*$this->qtdEstoque;
    }

    public function toString():string {
        return "Produto: {$this->nome}, Preço (R$): {$this->preco} - Qtde em estoque: {$this->qtdEstoque}.";
    }
}