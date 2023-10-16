<?php

$produtos = [
    [
        'nome' => 'Leite Longa Vida',
        'preco' => 3.59,
        'fabricante' => 'ParmaVita',
        'embalagem' => '1L',
        'quantidade' => 50
    ],
    [
        'nome' => 'Achocolatado em Pó',
        'preco' => 13.99,
        'fabricante' => 'Neschoc',
        'embalagem' => '700g',
        'quantidade' => 20
    ],
    [
        'nome' => 'Azeite de Oliva',
        'preco' => 28.50,
        'fabricante' => 'Galinho',
        'embalagem' => '500ml',
        'quantidade' => 25
    ],
    [
        'nome' => 'Refrigerante de Limão',
        'preco' => 7.40,
        'fabricante' => 'Refresh',
        'embalagem' => '2L',
        'quantidade' => 30
    ],
    [
        'nome' => 'Chá Mate',
        'preco' => 7.10,
        'fabricante' => 'Refresh',
        'embalagem' => '2L',
        'quantidade' => 15
    ]
];

function adicionarProduto(array $arrayProdutos, int $codigoProduto, int $qtd): array
{
    if ($qtd <= 0) {
        throw new Exception('Quantidade inválida!');
    } else if ($codigoProduto < 0 || $codigoProduto >= count($arrayProdutos) - 1) {
        throw new Exception('Código de produto inválido!');
    }
    $arrayProdutos[$codigoProduto]['quantidade'] += $qtd;
    return $arrayProdutos;
}

function removerProduto(array $arrayProdutos, int $codigoProduto, int $qtd): array
{
    if ($qtd <= 0) {
        throw new Exception('Quantidade inválida!');
    } else if ($codigoProduto < 0 || $codigoProduto >= count($arrayProdutos) - 1) {
        throw new Exception('Código de produto inválido!');
    } elseif ($qtd > $arrayProdutos[$codigoProduto]['quantidade']) {
        throw new Exception('Quantidade indisponível!');
    }
    $arrayProdutos[$codigoProduto]['quantidade'] -= $qtd;
    return $arrayProdutos;
}

function verificarDisponibilidade(array $arrayProdutos, int $codigoProduto): string
{
    if ($codigoProduto < 0 || $codigoProduto >= count($arrayProdutos) - 1) {
        throw new Exception('Código de produto inválido!');
    }
    $mensagem = "O produto {$arrayProdutos[$codigoProduto]['nome']} possui em estoque {$arrayProdutos[$codigoProduto]['quantidade']} unidade(s)";
    return $mensagem;
}


//adicionando produto
var_dump($produtos);

try {
    $produtos = adicionarProduto($produtos, 0, 10);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

var_dump($produtos);

//removendo produto
var_dump($produtos);

try {
    $produtos = removerProduto($produtos, 0, 10);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

var_dump($produtos);

//verificando disponibilidade de produto
try {
    echo verificarDisponibilidade($produtos, 0);
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}




/*>>>>Criar Lista de Produto============================================================
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
<<<<============================================================*/
