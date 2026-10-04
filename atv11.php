<?php
function formatarTexto(string $texto): array
{
    return [
        'maiusculas'          => mb_strtoupper($texto),
        'minusculas'          => mb_strtolower($texto),
        'primeira_maiuscula'  => mb_convert_case($texto, MB_CASE_TITLE, 'UTF-8'),
        'total_caracteres'    => mb_strlen($texto),
    ];
}
?>