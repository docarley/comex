package br.com.alura.comex.main;

import br.com.alura.comex.models.Cliente;
import br.com.alura.comex.models.Endereco;
import br.com.alura.comex.models.Pedido;
import br.com.alura.comex.models.Produto;

public class MainPedido {
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

        Pedido pedidoCliente1 = new Pedido();
        pedidoCliente1.setCliente(cliente1);
        pedidoCliente1.setID(1);
        pedidoCliente1.setPreco(89.00);
        pedidoCliente1.setQuantidade(3);

        System.out.println(pedidoCliente1);

    }
}
