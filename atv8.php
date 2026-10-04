<?php
function semAcento(string $texto): string
{
    $troca = [
        'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
        'é' => 'e', 'è' => 'e', 'ê' => 'e',
        'í' => 'i', 'ì' => 'i', 'î' => 'i',
        'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o',
        'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
        'ç' => 'c',
    ];
    return strtr(mb_strtolower($texto), $troca);
}

function ordenarNomes(string $lista): array
{
    $nomes = array_map('trim', explode(',', $lista));
    $nomes = array_values(array_filter($nomes, fn($n) => $n !== ''));

    usort($nomes, fn($a, $b) => strcmp(semAcento($a), semAcento($b)));

    return $nomes;
}
?>