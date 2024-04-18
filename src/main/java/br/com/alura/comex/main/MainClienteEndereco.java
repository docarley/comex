package br.com.alura.comex.main;

import br.com.alura.comex.models.Cliente;
import br.com.alura.comex.models.Endereco;

public class MainClienteEndereco {
    public static void main(String[] args) {
        Cliente cliente1 = new Cliente(); //instanciando com construtor padrão

        Endereco enderecoCliente1 = new Endereco("Marapé","Santos","ap 142","SP","Pedro Gonçalves",345);
        //instanciando com construtor customizado

        cliente1.setNome("Juquinha");
        cliente1.setCpf("22233344455");
        cliente1.setEmail("juquinha@alurasenac.com.br");
        cliente1.setProfissao("desenvolvedor");
        cliente1.setTelefone("1197887788");
        cliente1.setEndereco(enderecoCliente1);

        System.out.println(cliente1);
    }
  }
