<?php

namespace Docarley\Comex\Model;
class Endereco
{
    //Construtor utilizando property promotion que promove os parâmetros do construtor
    //à atributos e automaticamente já os atribui no construtor.
    public function __construct(
        public string $tipoLogradouro,
        public string $nome,
        public string $numero,
        public string $complemento,
        public string $cep,
        public string $cidade,
        public string $uf
    ) {
    }

    public function getTipoLogradouro(): string
    {
        return $this->tipoLogradouro;
    }

    public function setTipoLogradouro(string $tipoLogradouro): void
    {
        $this->tipoLogradouro=$tipoLogradouro;
    }
    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome=$nome;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }
    public function setNumero(string $numero): void
    {
        $this->numero=$numero;
    }
    public function getComplemento(): string
    {
        return $this->complemento;
    }
    public function setComplemento(string $complemento): void
    {
        $this->complemento=$complemento;
    }
    public function getCep(): string
    {
        return $this->cep;
    }
    public function setCep(string $cep): void
    {
        $this->cep=$cep;
    }
    public function getCidade(): string
    {
        return $this->cidade;
    }
    public function setCidade(string $cidade): void
    {
         $this->cidade=$cidade;
    }

    public function getUf(): string
    {
        return $this->uf;
    }
    public function setUf(string $uf): void
    {
    $this->uf=$uf;
    }
    public function toString(): string
    {
        return "{$this->getTipoLogradouro()} {$this->getNome()}, {$this->getNumero()} {$this->getComplemento()}, CEP: {$this->getCep()} {$this->getCidade()}-{$this->getUf()}";
    }

}


