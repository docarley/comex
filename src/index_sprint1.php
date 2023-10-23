<?php

function verificarDesconto(float $valorCompra):float{
    if ($valorCompra>=100.00) {
        return round(($valorCompra * 0.9),2,PHP_ROUND_HALF_UP);
    }
    return round(($valorCompra),2,PHP_ROUND_HALF_UP);
}

function exibirDesconto(float $valorCompra):string{
    if($valorCompra===verificarDesconto($valorCompra)){
        $mensagem="Você não possui desconto.";
    } else {
        $mensagem="Você possui desconto!";
    }
    return PHP_EOL .  "$mensagem " . PHP_EOL . 
           "Total da Compra R$ $valorCompra"  . PHP_EOL . 
           "Total da Compra Com Desconto R$ " . verificarDesconto($valorCompra);      
}

echo exibirDesconto(1023.99);
echo exibirDesconto(23.99);


/*>>>>Criar Cliente ============================================================
$cliente = [
    'nome'=>'Juquinha da Silva',
    'email'=> 'juquinha@email.com.br',
    'celular'=>'5513988775544',
    'endereço'=>[
        'cep'=>'11077888',
        'tipoLogradouro'=>'Avenida',
        'logradouro'=>'7 de setembro',
        'numero'=>"343",
        'complemento'=>'ap 44',
        'cidade'=>'Old City'
    ]
];
<<<<============================================================*/

/*>>>>Gerenciar Estoque ============================================================
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

function retornarProdutoMaisCaro(array $arrayProdutos): string
{
    $indiceDoMaisCaro = 0;
    foreach ($arrayProdutos as $chave => $produto) {
        if ($arrayProdutos[$chave]['preco'] > $arrayProdutos[$indiceDoMaisCaro]['preco']) {
            $indiceDoMaisCaro = $chave;
        }
    }
    return "O produto mais caro é {$arrayProdutos[$indiceDoMaisCaro]['nome']} que custa R$ " .
        number_format($arrayProdutos[$indiceDoMaisCaro]['preco'], 2, ".", "");
}

function retornarProdutoMaisBarato(array $arrayProdutos): string
{
    $indiceDoMaisBarato = 0;
    foreach ($arrayProdutos as $chave => $produto) {
        if ($arrayProdutos[$chave]['preco'] < $arrayProdutos[$indiceDoMaisBarato]['preco']) {
            $indiceDoMaisBarato = $chave;
        }
    }
    return "O produto mais barato é {$arrayProdutos[$indiceDoMaisBarato]['nome']} que custa R$ " .
        number_format($arrayProdutos[$indiceDoMaisBarato]['preco'], 2, ".", "");
}

function retornarMediaDePreco(array $arrayProdutos): string
{
    $precoAcumulado = 0;
    foreach ($arrayProdutos as $chave => $valor) {
        $precoAcumulado = $precoAcumulado + $arrayProdutos[$chave]['preco'];
    }
    $media=number_format($precoAcumulado/count($arrayProdutos),2,".","");
    return "Média de preço: R$ $media";
}


echo retornarProdutoMaisCaro($produtos) . PHP_EOL;
echo retornarProdutoMaisBarato($produtos) . PHP_EOL;
echo retornarMediaDePreco($produtos);

<<<<============================================================*/


/*>>>>Gerenciar Estoque ============================================================
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
<<<<============================================================*/


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
