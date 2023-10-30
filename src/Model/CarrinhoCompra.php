<?php

namespace Docarley\Comex\Model;

class CarrinhoCompra
{

    public function __construct(
        private array $produtos
    ) {
    }

    public function getProdutos(): array
    {
        return $this->produtos;
    }

    //compra maior que 100, desconto de 10%
    public function getValorTotalProdutos()
    {
        $valorTotalProdutos = 0;
        foreach ($this->produtos as $item) {
            $valorTotalProdutos += $item->getPreco();
        }
        return $valorTotalProdutos >= 100 ? $valorTotalProdutos * 0.9 : $valorTotalProdutos; //retorno utilizando operador ternário
    }

    //compra maior que 100, não paga frete, do contrário, 9.99
    public function getValorFrete()
    {
        return $this->getValorTotalProdutos() >= 100 ? 0 : 9.99;
    }

    public function getValorTotalCompra(){
        return $this->getValorTotalProdutos() + $this->getValorFrete();
    }
}
