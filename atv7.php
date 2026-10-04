<?php
function calcularDesconto(float $valorTotal): array
{
    if ($valorTotal > 1000) {
        $percentual = 30;
    } elseif ($valorTotal > 500) {
        $percentual = 20;
    } elseif ($valorTotal > 100) {
        $percentual = 10;
    } else {
        $percentual = 0;
    }

    $desconto = $valorTotal * $percentual / 100;

    return [
        'valor_original'  => round($valorTotal, 2),
        'percentual'      => $percentual . '%',
        'desconto'        => round($desconto, 2),
        'valor_final'     => round($valorTotal - $desconto, 2),
    ];
}
?>