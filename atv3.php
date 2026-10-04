<?phpfunction mascararCpf(string $cpf): string
{
    $numeros = preg_replace('/\D/', '', $cpf);

    if (strlen($numeros) <= 4) {
        return $numeros;
    }

    return str_repeat('*', strlen($numeros) - 4) . substr($numeros, -4);
}
?>