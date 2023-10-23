<?php

namespace Docarley\Comex\Model;

class Pedido{

public function __construct(
    private int $id,
    private Cliente $cliente,
    private array $produtos
) {    
}

public function exibirDadosDoPedido():string{
    return "\tPedido: {$this->id}" . PHP_EOL . "\tCliente: {$this->cliente->getNome()}" . PHP_EOL . "{$this->listarProdutos()}";
}

public function listarProdutos():string{
    $listaProdutos="";
    echo "Lista de Pedidos:" . PHP_EOL;
    foreach ($this->produtos as $item) {
        $listaProdutos=$listaProdutos . "\t{$item->getNome()} - {$item->getPreco()}" . PHP_EOL;
    }
    return $listaProdutos;
}
}