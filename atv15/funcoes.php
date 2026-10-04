<?php

function calcularIMC(float $peso, float $altura): float
{
    if ($peso <= 0 || $altura <= 0) {
        return 0;
    }

    return round($peso / ($altura * $altura), 2);
}

function validarEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function gerarSenhaAleatoria(int $tamanho = 10): string
{
    $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%';
    $senha = '';
    $ultimoIndice = strlen($caracteres) - 1;

    for ($indice = 0; $indice < $tamanho; $indice++) {
        $senha .= $caracteres[random_int(0, $ultimoIndice)];
    }

    return $senha;
}

function contarVogais(string $texto): int
{
    return preg_match_all('/[aeiouáéíóúâêôãõ]/iu', $texto) ?: 0;
}

function inverterTexto(string $texto): string
{
    return implode('', array_reverse(preg_split('//u', $texto, -1, PREG_SPLIT_NO_EMPTY)));
}

function calcularIdade(string $dataNascimento): int
{
    $nascimento = new DateTime($dataNascimento);
    $hoje = new DateTime();

    return $nascimento->diff($hoje)->y;
}

function converterMoeda(float $valor, float $cotacaoDolar = 5.50): float
{
    if ($cotacaoDolar <= 0) {
        return 0;
    }

    return round($valor / $cotacaoDolar, 2);
}

function formatarTelefone(string $telefone): string
{
    $numeros = preg_replace('/\D/', '', $telefone);

    if (strlen($numeros) === 11) {
        return sprintf('(%s) %s-%s', substr($numeros, 0, 2), substr($numeros, 2, 5), substr($numeros, 7));
    }

    if (strlen($numeros) === 10) {
        return sprintf('(%s) %s-%s', substr($numeros, 0, 2), substr($numeros, 2, 4), substr($numeros, 6));
    }

    return $telefone;
}

function gerarSaudacao(int $hora): string
{
    if ($hora >= 5 && $hora < 12) {
        return 'Bom dia';
    }

    if ($hora >= 12 && $hora < 18) {
        return 'Boa tarde';
    }

    return 'Boa noite';
}

function validarSenhaForte(string $senha): bool
{
    return strlen($senha) >= 8
        && preg_match('/[A-Z]/', $senha)
        && preg_match('/[a-z]/', $senha)
        && preg_match('/[0-9]/', $senha)
        && preg_match('/[^a-zA-Z0-9]/', $senha);
}
