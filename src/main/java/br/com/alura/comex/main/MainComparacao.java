package br.com.alura.comex.main;

import br.com.alura.comex.models.Produto;

import java.util.Arrays;

public class MainComparacao {
    public static void main(String[] args) {
        Produto produto1 = new Produto();

        produto1.setNome("Mouse Microsoft");
        produto1.setDescricao("Modelo MS091231");
        produto1.setQuantidade(15);
        produto1.setPrecoUnitario(89.00);

        Produto produto2 = new Produto();

        produto2.setNome("Mouse Microsoft");
        produto2.setDescricao("Modelo MS091231");
        produto2.setQuantidade(15);
        produto2.setPrecoUnitario(89.00);

        int i =0;
      while(i<=1) {
          System.out.println("Produto 1:" + produto1.toString());
          System.out.println("Produto 2:" + produto2.toString());
          System.out.println("Comparando com == (operador que compara o valor no caso de tipos primitivos e o valor de endereço de memória no caso de tipos complexos)");
          if (produto1 == produto2) {
              System.out.println("Os produtos são iguais");
          } else {
              System.out.println("Os produtos não são iguais");
          }

          System.out.println("Comparando com equals (método que compara os valores que estão no objeto para o qual aponta uma referência)");
          if (produto1.equals(produto2)) {
              System.out.println("Os produtos são iguais");
          } else {
              System.out.println("Os produtos não são iguais");
          }
          System.out.println((i==0)?"******* Atribuindo uma referência à outra *******":"");
          produto2=produto1;
          i++;
      }
    }
}
