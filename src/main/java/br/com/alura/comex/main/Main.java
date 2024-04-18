package br.com.alura.comex.main;

import br.com.alura.comex.models.Produto;

public class Main {
    public static void main(String[] args) {
        Produto produto1 = new Produto();

        produto1.setNome("Mouse Microsoft");
        produto1.setDescricao("Modelo MS091231");
        produto1.setQuantidade(15);
        produto1.setPrecoUnitario(89.00);

        System.out.println(produto1); //forma menos verbosa - implícita ou produto1.toString();
    }

}
