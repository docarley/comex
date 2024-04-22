package br.com.alura.comex.models;

import java.math.BigDecimal;
import java.util.Objects;

public class Produto {
    //Propriedades já definidas como private
    private String nome;
    private String descricao;
    private BigDecimal precoUnitario;
    private Integer quantidade;

    //sobrecarga de construtores
    public Produto(String nome, BigDecimal precoUnitario, Integer quantidade) {
        //Neste construtor o usuário da classe já é obrigado a fornecer um nome,bem como preço e quantidade
        this.nome = nome;
        this.precoUnitario = precoUnitario;
        this.quantidade = quantidade;
        this.setDescricao("");
    }

    public Produto(String nome, String descricao, BigDecimal precoUnitario, Integer quantidade) {
        //Neste construtor o usuário da classe já é obrigado a fornecer um nome,bem como preço, quantidade e descricao
        this.nome = nome;
        setDescricao(descricao);
        this.precoUnitario = precoUnitario;
        this.quantidade = quantidade;
    }

    public String getNome() {
        return this.nome;
    }

    public String getDescricao() {
        return this.descricao;
    }

    public BigDecimal getPrecoUnitario() {
        return this.precoUnitario;
    }

    public Integer getQuantidade() {
        return this.quantidade;
    }

    public void setNome(String nome) {
//        if (nome.length()<3) return;
        this.nome = nome;
    }

    public void setDescricao(String descricao) {
        if (descricao==null || descricao.isEmpty()) {
            this.descricao="Não disponível";
            return;
        }
        this.descricao = descricao;
    }

    public void setPrecoUnitario(BigDecimal precoUnitario) {
//        if (precoUnitario<0) return;
        this.precoUnitario = precoUnitario;
    }

    public void setQuantidade(Integer quantidade) {
//         if (quantidade<0) return;
        this.quantidade = quantidade;
    }

    @Override
    public String toString() {
        return String.format("Produto{" + "\n" +
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

    public String imprimirDados(){
        return "\n>> Dados do Produto "+ "\n\n" +
                "::Nome:" + this.getNome() + "\n\n" +
                "::Descricao:" + this.getDescricao();
    }
}
