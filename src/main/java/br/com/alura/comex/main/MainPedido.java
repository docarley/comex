package br.com.alura.comex.main;

import br.com.alura.comex.models.Cliente;
import br.com.alura.comex.models.Endereco;
import br.com.alura.comex.models.Pedido;
import br.com.alura.comex.models.Produto;
import br.com.alura.comex.services.FiltroPedidoPorValor;

import java.math.BigDecimal;
import java.util.ArrayList;
import java.util.Collection;
import java.util.Collections;
import java.util.List;

public class MainPedido {
    public static void main(String[] args) {
        //1 Instanciando Clientes e Endereços
        Cliente cliente1 = new Cliente(); //instanciando com construtor padrão

        Endereco enderecoCliente1 = new Endereco("Marapé", "Santos", "ap 142", "SP", "Pedro Gonçalves", 345);
        //instanciando com construtor customizado

        cliente1.setNome("Juquinha");
        cliente1.setCpf("22233344455");
        cliente1.setEmail("juquinha@alurasenac.com.br");
        cliente1.setProfissao("desenvolvedor");
        cliente1.setTelefone("1197887788");
        cliente1.setEndereco(enderecoCliente1);

        Cliente cliente2 = new Cliente();
        Endereco enderecoCliente2 = new Endereco("Biquinha", "São Vicente", "ap 12", "SP", "das Rosas", 1345);
        //instanciando com construtor customizado

        cliente2.setNome("Melissa Rosa");
        cliente2.setCpf("77733313255");
        cliente2.setEmail("juquinha@alurasenac.com.br");
        cliente2.setProfissao("desenvolvedora");
        cliente2.setTelefone("1197774322");
        cliente2.setEndereco(enderecoCliente2);

        //2 Instanciando Produtos
        Produto produto1 = new Produto("Teclado Microsoft","Modelo MS091231",new BigDecimal("139.00"),1);
        Produto produto2 = new Produto("Mouse Microsoft","Modelo MS091231",new BigDecimal("79.00"),2);
        Produto produto3 = new Produto("Mouse Genérico",new BigDecimal("19.00"),2);
        Produto produto4 = new Produto("HDD Portátil",new BigDecimal("380.00"),1);


        //3 Instanciando Pedidos
        Pedido pedidoCliente1 = new Pedido(1, 3, cliente1, produto1);
//        pedidoCliente1.setCliente(cliente1);
//        pedidoCliente1.setID(1);
//        pedidoCliente1.setPreco(new BigDecimal("89.00"));
//        pedidoCliente1.setQuantidade(3);

        Pedido pedidoCliente2 = new Pedido(2, 5, cliente1, produto2);
//        pedidoCliente2.setCliente(cliente1);
//        pedidoCliente2.setID(2);
//        pedidoCliente2.setPreco(new BigDecimal("100.00"));
//        pedidoCliente2.setQuantidade(5);

        Pedido outroPedidoCliente1 = new Pedido(3, 1, cliente1, produto3);
        Pedido outroPedidoCliente2 = new Pedido(4, 10, cliente2, produto3);
        Pedido maisUmPedidoCliente1 = new Pedido(5, 1, cliente1, produto4);

        //4 - Mostrando pedidos
        System.out.println(pedidoCliente1);
        System.out.println(pedidoCliente2);
        System.out.println(outroPedidoCliente1);
        System.out.println(outroPedidoCliente2);
        System.out.println(maisUmPedidoCliente1);

//        System.out.println("Comparando pedidos");
//        System.out.println("Pedido de valor total " + pedidoCliente1.getValorTotal() + " é mais barato que pedido de valor total " + pedidoCliente2.getValorTotal() + "?");
//        System.out.println(pedidoCliente1.isMaisBaratoQue(pedidoCliente2));
//        System.out.println("Pedido de valor total " + pedidoCliente2.getValorTotal() + " é mais caro que pedido de valor total " + pedidoCliente1.getValorTotal()+ "?");
//        System.out.println(pedidoCliente1.isMaisCaroQue(pedidoCliente2));

        //5 - Mostrando pedidos conforme critério - Tarefa 8 etapa 1
        System.out.println(pedidoCliente1.sintetizarPedido());
        System.out.println(pedidoCliente2.sintetizarPedido());
        System.out.println(outroPedidoCliente1.sintetizarPedido());
        System.out.println(outroPedidoCliente2.sintetizarPedido());
        System.out.println(maisUmPedidoCliente1.sintetizarPedido());

        List<Pedido> listaPedidos = new ArrayList<>();
        listaPedidos.add(pedidoCliente1);
        listaPedidos.add(pedidoCliente2);
        listaPedidos.add(outroPedidoCliente1);
        listaPedidos.add(outroPedidoCliente2);
        listaPedidos.add(maisUmPedidoCliente1);

        //utilizando o for para sintetizar os pedidos que estão na lista
        for (Pedido item:listaPedidos){
            System.out.println(item.sintetizarPedido());
        }

        //6 - ordenando a lista de pedidos por valor total: maior para menor
        Collections.sort(listaPedidos,new FiltroPedidoPorValor().reversed());
        for (Pedido item:listaPedidos){
            System.out.println(item.sintetizarPedido());
        }

        //7 - ordenando a lista de pedidos por valor total: menor para maior
        Collections.sort(listaPedidos,new FiltroPedidoPorValor());
        for (Pedido item:listaPedidos){
            System.out.println(item.sintetizarPedido());
        }
    }
}
