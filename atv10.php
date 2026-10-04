<?php
function calcularMedia(array $notas): array
{
    if (count($notas) == 0) {
        return ['erro' => 'Nenhuma nota informada.'];
    }

    $media = array_sum($notas) / count($notas);

    if ($media >= 7) {
        $situacao = 'Aprovado';
    } elseif ($media >= 5) {
        $situacao = 'Recuperação';
    } else {
        $situacao = 'Reprovado';
    }

    return [
        'maior_nota' => max($notas),
        'menor_nota' => min($notas),
        'media'      => round($media, 2),
        'situacao'   => $situacao,
    ];
}
?>