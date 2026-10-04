<?php
function analisarTexto(string $texto): array
{
    $palavras = preg_split('/\s+/u', trim($texto), -1, PREG_SPLIT_NO_EMPTY);
    $vogais = preg_match_all('/[aeiouáàâãäéèêíìîóòôõúùûü]/iu', $texto);
    $letras = preg_match_all('/\p{L}/u', $texto);

    return [
        'palavras'    => count($palavras),
        'caracteres'  => mb_strlen($texto),
        'vogais'      => $vogais,
        'consoantes'  => $letras - $vogais,
    ];
}
?>