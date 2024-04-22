package br.com.alura.comex.models;

import java.math.BigDecimal;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class Pedido {
    private Integer ID;
    private Cliente cliente;
    private Produto produto;
    private BigDecimal preco;
    private Integer quantidade;
    private Date data;

    public Pedido(Integer ID, Integer quantidade, Cliente cliente,Produto produto) {
        setID(ID);
        this.preco=produto.getPrecoUnitario();
        setQuantidade(quantidade);
        setCliente(cliente);
        setProduto(produto);
        this.data = new Date();
    }

    public void setProduto(Produto produto) {
        this.produto = produto;
    }

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
        DateFormat formatoDataPedido = new SimpleDateFormat("dd/MM/yy HH:mm:ss");
        return "Pedido{" +
                "ID=" + ID +
                ", data=" + formatoDataPedido.format(data) +
                ", cliente=" + cliente.toString() +
                ", produto=" + produto.toString() +
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

    public String sintetizarPedido(){
        return "Pedido{" +
                "produto=" + produto.getNome()+
                ", cliente=" + cliente.getNome() +
                ", preco total=" + this.getValorTotal() +
                ", data=" + new SimpleDateFormat("dd/MM/yy HH:mm:ss").format(data) +
                '}';
    }
}
