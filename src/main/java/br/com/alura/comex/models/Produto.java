package br.com.alura.comex.models;

import java.util.Objects;

public class Produto {
    //Propriedades já definidas como private
    private String nome;
    private String descricao;
    private double precoUnitario;
    private int quantidade;

    public String getNome() {
        return this.nome;
    }

    public String getDescricao() {
        return this.descricao;
    }

    public double getPrecoUnitario() {
        return this.precoUnitario;
    }

    public int getQuantidade() {
        return this.quantidade;
    }

    public void setNome(String nome) {
//        if (nome.length()<3) return;
        this.nome = nome;
    }

    public void setDescricao(String descricao) {
        this.descricao = descricao;
    }

    public void setPrecoUnitario(Double precoUnitario) {
//        if (precoUnitario<0) return;
        this.precoUnitario = precoUnitario;
    }

    public void setQuantidade(Integer quantidade) {
//         if (quantidade<0) return;
        this.quantidade = quantidade;
    }

    @Override
    public String toString() {
        return String.format("Produto{" +
                "nome='" + this.getNome() + '\'' +
                ", descricao='" + this.getDescricao() + '\'' +
                ", precoUnitario= %.2f" +
                ", quantidade=" + this.getQuantidade() +
                '}', this.getPrecoUnitario());
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Produto produto = (Produto) o;
        return Objects.equals(getNome(), produto.getNome()) && Objects.equals(getDescricao(), produto.getDescricao());
    }

}
