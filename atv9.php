<?php
function ehPrimo(int $n): bool
{
    if ($n < 2) {
        return false;
    }
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function ehPerfeito(int $n): bool
{
    if ($n < 2) {
        return false;
    }
    $soma = 0;
    for ($i = 1; $i <= $n / 2; $i++) {
        if ($n % $i == 0) {
            $soma += $i;
        }
    }
    return $soma == $n;
}

function analisarNumero(int $numero): array
{
    return [
        'numero'   => $numero,
        'paridade' => $numero % 2 == 0 ? 'Par' : 'Ímpar',
        'primo'    => ehPrimo($numero) ? 'É primo' : 'Não é primo',
        'perfeito' => ehPerfeito($numero) ? 'É perfeito' : 'Não é perfeito',
    ];
}

?>