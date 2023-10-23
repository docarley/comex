<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Docarley\Comex\Model\Cliente;
use Docarley\Comex\Model\Endereco;
use Docarley\Comex\Model\Produto;
use Docarley\Comex\Model\Pedido;


/*1*/
$cliente = new Cliente('Pedrinho','44455566677','13988776655',1231,
    new Endereco('Avenida','Rua das Margaridas','22','ap 55','11090888','Santos','SP'));

echo $cliente->exibirDadosCliente();

echo PHP_EOL . $cliente->getEndereco()->toString();

/*2*/
$produto = new Produto("Leite Longa Vida Parmaleite 1L",4.59,200);

//Adicionando produto
$produto->adicionarProduto(10);
echo PHP_EOL . $produto->toString() . PHP_EOL;
//Removendo produto
$produto->removerProduto(5);
echo $produto->toString() . PHP_EOL;
//Adicionando produto - quantidade inválida
$produto->adicionarProduto(0);
if ($produto->adicionarProduto(0)<0) {
    echo "Produto não adicionado, um erro ocorreu!". PHP_EOL;    
}
//Removendo produto - quantidade inválida
$produto->removerProduto(0);
if ($produto->removerProduto(0)<0) {
    echo "Produto não removido, um erro ocorreu!". PHP_EOL;    
}
echo $produto->toString() . PHP_EOL;

/*3*/
$outroProduto = new Produto("Arroz Tio Juquinha 5kg",19.90,100);

$pedido = new Pedido(1,$cliente,[$produto,$outroProduto]);
echo $pedido->exibirDadosDoPedido();
