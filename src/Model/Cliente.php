<?php

namespace Docarley\Comex\Model;

class Cliente
{
    private array $pedidos = [];
    //Construtor utilizando property promotion que promove os parâmetros do construtor
    //à atributos e automaticamente já os atribui no construtor.
    public function __construct(
        private string $nome,
        private string $cpf,
        private string $telefone,
        private float $totalEmCompras,
        private Endereco $endereco        
    ) {
    }
    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome=$nome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
    public function setCpf(string $cpf): void
    {
        $this->cpf=$cpf;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getTelefoneFormatado(): string{
        return preg_replace("/(\d{2})(\d{1})(\d{4})(\d{4})/","($1) $2 $3-$4",$this->telefone);        
    }

    public function setTelefone(string $telefone):void 
    {
        $this->telefone=$telefone;
    }

    public function getTotalEmCompras(): float
    {
        return $this->totalEmCompras;
    }

    public function setTotalEmCompras(float $totalCompras): void
    {
        $this->totalEmCompras=$totalCompras;
    }
  
    public function getCliente(): Cliente
    {
        return $this;
    } 
    
    public function getEndereco(): Endereco
    {
        return $this->endereco;
    } 
    public function getPedidos():array{
        return $this->pedidos;
    }
   
    public function adicionarPedido(Pedido $pedido):int{
        array_push($this->pedidos,$pedido);
        return $pedido->getId();
    }

    public function exibirDadosCliente() : string{
        return "Nome: {$this->getNome()}" . PHP_EOL . "Cpf:  {$this->getCpf()}". PHP_EOL. "Telefone: {$this->getTelefone()}" . PHP_EOL . "Endereço:  {$this->endereco->toString()}";
    }    
}
