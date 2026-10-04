<?php
function inverterTexto(string $texto): string
{
    echo 'Quantidade de caracteres da string original: ' . mb_strlen($texto) . "\n";

    $letras = mb_str_split($texto);
    return implode('', array_reverse($letras));
}
?>