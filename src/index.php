<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Docarley\Comex\Model\Cliente;
use Docarley\Comex\Model\Endereco;


$cliente = new Cliente('Pedrinho','44455566677','13988776655',1231,
    new Endereco('Avenida','Rua das Margaridas','22','ap 55','11090888','Santos','SP'));

echo $cliente->exibirDadosCliente();

echo PHP_EOL . $cliente->getEndereco()->toString();




    