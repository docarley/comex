<?php

namespace Docarley\Comex\Tests;

use Docarley\Comex\Exceptions\EstoqueIndisponivelException;
use PHPUnit\Framework\TestCase;
use Docarley\Comex\Model\Produto;
use InvalidArgumentException;

use function PHPUnit\Framework\assertEquals;

class ProdutoTest extends TestCase
{

    public function testGetNome()
    {
        $nomeProduto = 'Produto Teste A';

        $produtoTeste = new Produto($nomeProduto, 10, 100, 10);
        $this->assertEquals($nomeProduto, $produtoTeste->getNome());
    }

    public function testSetNome()
    {
        $nomeProduto = 'Produto Teste A';

        $produtoTeste = new Produto('Produto', 10, 100, 10);
        $produtoTeste->setNome($nomeProduto);
        $this->assertEquals($nomeProduto, $produtoTeste->getNome());
    }

    public function testGetPrecoBase()
    {
        $precoBase = 10;

        $produtoTeste = new Produto('Produto Teste A', $precoBase, 100, 10);
        $this->assertEquals($precoBase, $produtoTeste->getPrecoBase());
    }
    public function testSetPrecoBase()
    {
        $precoBase = 10;

        $produtoTeste = new Produto('Produto Teste A', 2.50, 100, 10);
        $produtoTeste->setPrecoBase($precoBase);
        $this->assertEquals($precoBase, $produtoTeste->getPrecoBase());
    }

    public function testGetPrecoComDesconto()
    {
        $percentualDesconto = 10;
        $preco = 10;
        $precoComDesconto = $preco - ($preco * ($percentualDesconto / 100));

        $produtoTeste = new Produto('Produto Teste A', $preco, 100, $percentualDesconto);
        $this->assertEquals($precoComDesconto, $produtoTeste->getPreco());
    }

    public function testGetPrecoSemDesconto()
    {
        $percentualDesconto = 0;
        $preco = 10;
        $precoSemDesconto = 10;

        $produtoTeste = new Produto('Produto Teste A', $preco, 100, $percentualDesconto);
        $this->assertEquals($precoSemDesconto, $produtoTeste->getPreco());
    }
    public function testGetQtdEstoque()
    {
        $qtdEstoque = 100;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        $this->assertEquals($qtdEstoque, $produtoTeste->getQtdEstoque());
    }

    public function testToString()
    {
        $nome = 'Produto Teste A';
        $preco = 10;
        $qtdEstoque = 100;
        $retorno = "Produto: {$nome}, Preço (R$): {$preco} - Qtde em estoque: {$qtdEstoque}.";

        $produtoTeste = new Produto($nome, $preco, $qtdEstoque, 0);
        $this->assertEquals($retorno, $produtoTeste->toString());
    }

    public function testAdicionarProdutoValorDefault()
    {
        $qtdEstoque = 100;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        
        $this->assertEquals(101, $produtoTeste->adicionarProduto());
    }

    public function testAdicionarProdutoValorValido()
    {
        $qtdEstoque = 100;
        $qtdAdicionada = 10;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);

        $this->assertEquals($qtdEstoque + $qtdAdicionada,$produtoTeste->adicionarProduto($qtdAdicionada));
    }

    public function testAdicionarProdutoValorZero()
    {
        $qtdEstoque = 100;
        $qtdAdicionada = 0;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A quantidade deve ser um número positivo e diferente de zero');
        $produtoTeste->adicionarProduto($qtdAdicionada);
    }
    public function testAdicionarProdutoValorNegativo()
    {
        $qtdEstoque = 100;
        $qtdAdicionada = -1;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A quantidade deve ser um número positivo e diferente de zero');
        $produtoTeste->adicionarProduto($qtdAdicionada);
    }

    public function testRemoverProdutoValorDefault()
    {
        $qtdEstoque = 100;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        
        $this->assertEquals(99, $produtoTeste->removerProduto());
    }

    public function testRemoverProdutoValorValido()
    {
        $qtdEstoque = 100;
        $qtdRemovida = 10;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        
        $this->assertEquals($qtdEstoque - $qtdRemovida, $produtoTeste->removerProduto($qtdRemovida));
    }
    public function testRemoverProdutoValorZero()
    {
        $qtdEstoque = 100;
        $qtdRemovida = 0;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A quantidade deve ser um número positivo e diferente de zero');
        $produtoTeste->removerProduto($qtdRemovida);
    }
    public function testRemoverProdutoValorNegativo()
    {
        $qtdEstoque = 100;
        $qtdRemovida = -1;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('A quantidade deve ser um número positivo e diferente de zero');
        $produtoTeste->removerProduto($qtdRemovida);
    }
    public function testRemoverProdutoValorMaiorQueExistenteEmEstoque()
    {
        $qtdEstoque = 100;
        $qtdRemovida = 101;

        $produtoTeste = new Produto('Produto Teste A', 10, $qtdEstoque, 10);
        $this->expectException(EstoqueIndisponivelException::class);
        $this->expectExceptionMessage("O estoque disponível é {$qtdEstoque}. A quantidade solicitada foi {$qtdRemovida}");
        $produtoTeste->removerProduto($qtdRemovida);
    }
}
