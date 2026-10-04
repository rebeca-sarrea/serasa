<?php
function estatisticasNumericas(array $numeros): array
{
    if (count($numeros) == 0) {
        return ['erro' => 'Nenhum número informado.'];
    }

    $ordenados = $numeros;
    sort($ordenados);
    $qtd = count($ordenados);
    $meio = intdiv($qtd, 2);

    // mediana: valor do meio (ou média dos dois do meio)
    $mediana = $qtd % 2 == 1 ? $ordenados[$meio] : ($ordenados[$meio - 1] + $ordenados[$meio]) / 2;

    $pares = 0;
    $impares = 0;
    foreach ($numeros as $n) {
        if (floor($n) == $n) {
            if ($n % 2 == 0) {
                $pares++;
            } else {
                $impares++;
            }
        }
    }
    
    return [
        'soma'     => array_sum($numeros),
        'media'    => round(array_sum($numeros) / $qtd, 2),
        'maior'    => max($numeros),
        'menor'    => min($numeros),
        'mediana'  => $mediana,
        'pares'    => $pares,
        'impares'  => $impares,
    ];
}