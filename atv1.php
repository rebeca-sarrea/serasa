<?php
function calcularFormula(float $x, float $y)
{
    $soma = $x + $y;

    if ($soma == 0) {
        return 'Não é possível realizar a divisão, pois x + y é igual a zero.';
    }

    return ($x ** 2 + $y ** 2) / $soma;
}
?>