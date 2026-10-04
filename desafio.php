<?php

function calcularSubtotal(array $produto): float
{
    return round($produto['quantidade'] * $produto['valor_unitario'], 2);
}

function calcularDesconto(float $total): float
{
    if ($total > 1000) {
        return round($total * 0.15, 2);
    }

    if ($total > 500) {
        return round($total * 0.10, 2);
    }

    return 0;
}

function calcularFrete(float $total): float
{
    if ($total > 800) {
        return 0;
    }

    return $total <= 300 ? 35.00 : 20.00;
}

function calcularTotalItens(array $produtos): int
{
    $totalItens = 0;

    foreach ($produtos as $produto) {
        $totalItens += $produto['quantidade'];
    }

    return $totalItens;
}

function processarPedido(array $produtos): array
{
    $totalCompra = 0;
    $produtoMaisCaro = null;
    $produtoMaiorSubtotal = null;
    $subtotais = [];

    foreach ($produtos as $produto) {
        $subtotal = calcularSubtotal($produto);
        $subtotais[] = [
            'nome' => $produto['nome'],
            'quantidade' => $produto['quantidade'],
            'valor_unitario' => $produto['valor_unitario'],
            'subtotal' => $subtotal,
        ];
        $totalCompra += $subtotal;

        if ($produtoMaisCaro === null || $produto['valor_unitario'] > $produtoMaisCaro['valor_unitario']) {
            $produtoMaisCaro = $produto;
        }

        if ($produtoMaiorSubtotal === null || $subtotal > $produtoMaiorSubtotal['subtotal']) {
            $produtoMaiorSubtotal = array_merge($produto, ['subtotal' => $subtotal]);
        }
    }

    $totalCompra = round($totalCompra, 2);
    $desconto = calcularDesconto($totalCompra);
    $frete = calcularFrete($totalCompra);

    return [
        'quantidade_produtos_diferentes' => count($produtos),
        'quantidade_total_itens' => calcularTotalItens($produtos),
        'produto_mais_caro' => $produtoMaisCaro,
        'produto_maior_subtotal' => $produtoMaiorSubtotal,
        'subtotais' => $subtotais,
        'total_compra' => $totalCompra,
        'desconto' => $desconto,
        'frete' => $frete,
        'valor_final' => round($totalCompra - $desconto + $frete, 2),
    ];
}