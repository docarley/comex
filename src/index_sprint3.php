<?php
/*** SPRINT3 = 7 no geral ***/
require_once __DIR__ . "/../vendor/autoload.php";

use Docarley\Comex\Model\Produto;
use Docarley\Comex\Model\Exceptions\EstoqueIndisponivelException;

// 1 Regra do Estoque =============================================================
$meuProduto = new Produto("Refrigerante Guaraná Polo Norte 2L",6.20,4);
$meuProduto->adicionarProduto(0);


// 2 Tratando erros =============================================================
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

//3 Arrumando Arquivos com namespaces ===========================================
//aplicado//

//4 Meios de Pagamento ==========================================================

