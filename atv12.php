<?php
function analisarProdutos(array $produtos, string $busca): array
{
    if (count($produtos) == 0) {
        return ['erro' => 'Nenhum produto informado.'];
    }

    $maisCaro = $produtos[0];
    $maisBarato = $produtos[0];
    $soma = 0;
    $encontrados = [];

    foreach ($produtos as $produto) {
        if ($produto['preco'] > $maisCaro['preco']) {
            $maisCaro = $produto;
        }
        if ($produto['preco'] < $maisBarato['preco']) {
            $maisBarato = $produto;
        }
        $soma += $produto['preco'];

        if ($busca !== '' && mb_stripos($produto['nome'], $busca) !== false) {
            $encontrados[] = $produto;
        }
    }

    return [
        'mais_caro'    => $maisCaro,
        'mais_barato'  => $maisBarato,
        'media_precos' => round($soma / count($produtos), 2),
        'pesquisa'     => count($encontrados) > 0 ? $encontrados : "Nenhum produto encontrado para '$busca'.",
    ];
}
?>