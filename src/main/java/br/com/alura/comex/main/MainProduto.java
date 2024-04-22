package br.com.alura.comex.main;

import br.com.alura.comex.models.Produto;

import java.math.BigDecimal;

public class MainProduto {
    public static void main(String[] args) {
        Produto produto1 = new Produto("Mouse Microsoft","Modelo MS091231",new BigDecimal("89.00"),15);

            System.out.println(produto1); //forma menos verbosa - implícita ou produto1.toString();
    }

}
