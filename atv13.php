<?php
function cifraCesar(string $texto, int $deslocamento): string
{
    $deslocamento = (($deslocamento % 26) + 26) % 26;
    $resultado = '';

    for ($i = 0; $i < strlen($texto); $i++) {
        $c = $texto[$i];

        if ($c >= 'a' && $c <= 'z') {
            $c = chr((ord($c) - ord('a') + $deslocamento) % 26 + ord('a'));
        } elseif ($c >= 'A' && $c <= 'Z') {
            $c = chr((ord($c) - ord('A') + $deslocamento) % 26 + ord('A'));
        }

        $resultado .= $c;
    }

    return $resultado;
}

function criptografarMensagem(string $texto, int $chave = 3): string
{
    return cifraCesar($texto, $chave);
}

function descriptografarMensagem(string $texto, int $chave = 3): string
{
    return cifraCesar($texto, -$chave);
}
?>