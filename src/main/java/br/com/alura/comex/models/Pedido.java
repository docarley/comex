package br.com.alura.comex.models;

import java.math.BigDecimal;
import java.util.Comparator;

public class Pedido {
    private Integer ID;
    private Cliente cliente;
    private BigDecimal preco;
    private Integer quantidade;


    public void setID(Integer ID) {
        this.ID = ID;
    }

    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }

    public void setPreco(BigDecimal preco) {
        this.preco = preco;
    }

    public void setQuantidade(Integer quantidade) {
        this.quantidade = quantidade;
    }

    public BigDecimal getPreco() {
        return preco;
    }

    public Integer getQuantidade() {
        return quantidade;
    }

    @Override
    public String toString() {
        return "Pedido{" +
                "ID=" + ID +
                ", cliente=" + cliente.toString() +
                ", preco=" + preco +
                ", quantidade=" + quantidade +
                ", valor total=" + this.getValorTotal() +
                '}';
    }

     public boolean isMaisBaratoQue(Pedido outroPedido){
         return this.getValorTotal().compareTo(outroPedido.getValorTotal())==-1;
    }

    public boolean isMaisCaroQue(Pedido outroPedido){
        return this.getValorTotal().compareTo(outroPedido.getValorTotal())==1;
    }

    public BigDecimal getValorTotal() {
       return this.getPreco().multiply(new BigDecimal(getQuantidade().toString()));
    }
}
