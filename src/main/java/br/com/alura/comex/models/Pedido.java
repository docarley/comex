package br.com.alura.comex.models;

public class Pedido {
    private int ID;
    private Cliente cliente;
    private double preco;
    private int quantidade;


    public void setID(int ID) {
        this.ID = ID;
    }

    public void setCliente(Cliente cliente) {
        this.cliente = cliente;
    }

    public void setPreco(double preco) {
        this.preco = preco;
    }

    public void setQuantidade(int quantidade) {
        this.quantidade = quantidade;
    }

    @Override
    public String toString() {
        return "Pedido{" +
                "ID=" + ID +
                ", cliente=" + cliente.toString() +
                ", preco=" + preco +
                ", quantidade=" + quantidade +
                '}';
    }
}
