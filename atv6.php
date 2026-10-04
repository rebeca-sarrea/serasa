<?php
function normalizarEscala(string $escala): string
{
    $escala = strtolower(trim($escala));
    $mapa = ['c' => 'celsius', 'f' => 'fahrenheit', 'k' => 'kelvin'];
    return $mapa[$escala] ?? $escala;
}

function converterTemperatura(float $valor, string $origem, string $destino)
{
    $origem = normalizarEscala($origem);
    $destino = normalizarEscala($destino);
    $validas = ['celsius', 'fahrenheit', 'kelvin'];

    if (!in_array($origem, $validas) || !in_array($destino, $validas)) {
        return 'Escala inválida. Use Celsius, Fahrenheit ou Kelvin.';
    }

    switch ($origem) {
        case 'fahrenheit':
            $celsius = ($valor - 32) * 5 / 9;
            break;
        case 'kelvin':
            $celsius = $valor - 273.15;
            break;
        default:
            $celsius = $valor;
    }

    if ($celsius < -273.15) {
        return 'Temperatura abaixo do zero absoluto, valor impossível.';
    }

    switch ($destino) {
        case 'fahrenheit':
            $resultado = $celsius * 9 / 5 + 32;
            break;
        case 'kelvin':
            $resultado = $celsius + 273.15;
            break;
        default:
            $resultado = $celsius;
    }

    return round($resultado, 2);
}
?>