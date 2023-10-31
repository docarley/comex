<?php

namespace Docarley\Comex\Model;

use DomainException;
class EstoqueIndisponivelException extends DomainException{

    public function __construct(float $qtdEmEstoque, float $qtd){
        $message="O estoque disponível é {$qtdEmEstoque}. A quantidade solicitada foi {$qtd}";
        parent::__construct($message);
    }
}