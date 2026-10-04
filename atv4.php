<?php
function gerarSenha(int $tamanho): string
{
    if ($tamanho < 1) {
        return '';
    }

    $grupos = [
        'abcdefghijklmnopqrstuvwxyz',
        'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        '0123456789',
        '!@#$%&*?+-=_',
    ];
    $todos = implode('', $grupos);
    $senha = [];

    if ($tamanho >= 4) {
        foreach ($grupos as $grupo) {
            $senha[] = $grupo[random_int(0, strlen($grupo) - 1)];
        }
    }

    while (count($senha) < $tamanho) {
        $senha[] = $todos[random_int(0, strlen($todos) - 1)];
    }

    for ($i = count($senha) - 1; $i > 0; $i--) {
        $j = random_int(0, $i);
        [$senha[$i], $senha[$j]] = [$senha[$j], $senha[$i]];
    }

    return implode('', $senha);
}
?>