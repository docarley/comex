<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Docarley\Comex\Model\{Cliente, Endereco, Produto, Pedido, CarrinhoCompra, EstoqueIndisponivelException};

/*1*/

$cliente = new Cliente(
    'Pedrinho',
    '44455566677',
    '13988776655',
    1231,
    new Endereco('Avenida', 'Rua das Margaridas', '22', 'ap 55', '11090888', 'Santos', 'SP')
);

echo $cliente->exibirDadosCliente();

echo PHP_EOL . $cliente->getEndereco()->toString();

/*2*/
$produto = new Produto("Leite Longa Vida Parmaleite 1L", 4.59, 200);

//Adicionando produto
//$produto->adicionarProduto(10);
//echo PHP_EOL . $produto->toString() . PHP_EOL;
//Removendo produto
//$produto->removerProduto(5);
//echo $produto->toString() . PHP_EOL;
//Adicionando produto - quantidade inválida
//$produto->adicionarProduto(0);
//if ($produto->adicionarProduto(0)<0) {
//    echo "Produto não adicionado, um erro ocorreu!". PHP_EOL;    
//}
//Removendo produto - quantidade inválida
//$produto->removerProduto(0);
//if ($produto->removerProduto(0)<0) {
//    echo "Produto não removido, um erro ocorreu!". PHP_EOL;    
//}
//echo $produto->toString() . PHP_EOL;

/*3*/
$outroProduto = new Produto("Arroz Tio Juquinha 5kg", 19.90, 100);

$pedido = new Pedido(1, $cliente, [$produto, $outroProduto]);
echo $pedido->exibirDadosDoPedido();

/*4*/
echo $cliente->adicionarPedido($pedido);

$produto1 = new Produto("Achocolatado Neschoc 1kg", 15.99, 120);
$produto2 = new Produto("Feijão Tio Juquinha 1kg", 9.99, 200);
$outroPedido = new Pedido(2, $cliente, [$produto1, $produto2]);
$cliente->adicionarPedido($outroPedido);
var_dump($cliente);

/*5*/

$carrinho = new CarrinhoCompra([$produto1, $produto2]);
var_dump($carrinho);
echo "Valor Total dos Produtos R$: {$carrinho->getValorTotalProdutos()}" . PHP_EOL .
    "Valor do Frete R$: {$carrinho->getValorFrete()}" . PHP_EOL .
    "Valor Total da Compra R$: {$carrinho->getValorTotalCompra()}";

/*6*/
echo $cliente->exibirDadosCliente() . PHP_EOL;
echo "Telefone Formatado: {$cliente->getTelefoneFormatado()}" . PHP_EOL;

/*** SPRINT3 ***/

/*1-Regras do Estoque*/
//$meuProduto = new Produto("Refrigerante Guaraná Polo Norte 2L",6.20,4);
//$meuProduto->adicionarProduto(0);

/*2-Tratando Erros*/
$meuProduto = new Produto("Refrigerante Guaraná Polo Norte 2L", 6.20, 4);
try {
    //intdiv(2,0);
    $meuProduto->removerProduto(0);
} catch (InvalidArgumentException $e) {
    echo "Erro:{$e->getMessage()}";
} catch (EstoqueIndisponivelException $e) {
    echo "Erro:{$e->getMessage()}";
} catch (\Throwable $e) {
    echo "Erro:{$e->getMessage()}";
}
