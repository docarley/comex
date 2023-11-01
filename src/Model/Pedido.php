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

public function getId():int{
    return $this->id;
}

public function getValorTotal():float{
    $valorTotalPedido=0;
    foreach ($this->produtos as $item) {
        $valorTotalPedido+=$item->getPreco;
    }
    return $valorTotalPedido;
}

public function listarProdutos():string{
    $listaProdutos="";
    echo "Lista de Pedidos:" . PHP_EOL;
    foreach ($this->produtos as $item) {
        $listaProdutos=$listaProdutos . "\t{$item->getNome()} - {$item->getPreco()}" . PHP_EOL;
    }
    return $listaProdutos;
}


public function adicionarProdutos(Produto $produto):int{
    array_push($this->produtos, $produto);
    //$this->produtos[]= $produto;  // alternativa ao array push
    //array_push($this->produtos, $produto1, $produto2 $produto3); //adicionando mais de um item
    return count($this->produtos);
}
}

