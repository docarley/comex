<?php

$produtos = [
    [
        'nome' => 'Leite Longa Vida',
        'preco' => 3.59,
        'fabricante' => 'ParmaVita',
        'embalagem' => '1L'
    ],
    [
        'nome' => 'Achocolatado em Pó',
        'preco' => 13.99,
        'fabricante' => 'Neschoc',
        'embalagem' => '700g'
    ],
    [
        'nome' => 'Azeite de Oliva',
        'preco' => 28.50,
        'fabricante' => 'Galinho',
        'embalagem' => '500ml'
    ],
    [
        'nome' => 'Refrigerante de Limão',
        'preco' => 7.40,
        'fabricante' => 'Refresh',
        'embalagem' => '2L'
    ],
    [
        'nome' => 'Chá Mate',
        'preco' => 7.10,
        'fabricante' => 'Refresh',
        'embalagem' => '2L'
    ]
];

//Função exibir produtos
function exibirArrayProdutos(array $arrayProdutos){

    echo 'LISTA DE PRODUTOS' . PHP_EOL;
    echo '============================' . PHP_EOL;
    foreach ($arrayProdutos as $chave => $item) {
        echo PHP_EOL . "#{$chave}:";
        foreach ($item as $value) {
            echo " {$value}";
        }
    }
}
//Exibindo produtos
exibirArrayProdutos($produtos);
