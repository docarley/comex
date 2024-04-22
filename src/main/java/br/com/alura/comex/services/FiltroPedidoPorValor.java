package br.com.alura.comex.services;

import br.com.alura.comex.models.Pedido;

import java.math.BigDecimal;
import java.util.Comparator;

public class FiltroPedidoPorValor implements Comparator<Pedido>{

    @Override
    public int compare(Pedido pedido1, Pedido pedido2) {
        return (int) Math.floor(pedido1.getValorTotal().subtract(pedido2.getValorTotal()).doubleValue());
    }
}
