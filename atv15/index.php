<?php
require_once 'funcoes.php';
require_once 'desafio_pedidos.php';

function moeda($valor){
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

echo '<h2>Exercício 15 - Biblioteca de Funções</h2>';
echo '1. IMC: ' . calcularIMC(70, 1.75) . '<br>';
echo '2. Validação de e-mail: ' . (validarEmail('aluno@escola.com') ? 'E-mail válido' : 'E-mail inválido') . '<br>';
echo '3. Senha gerada: ' . gerarSenhaAleatoria(10) . '<br>';
echo '4. Quantidade de vogais: ' . contarVogais('desenvolvimento web') . '<br>';
echo '5. Texto invertido: ' . inverterTexto('Programação') . '<br>';
echo '6. Idade: ' . calcularIdade('2005-01-01') . ' anos<br>';
echo '7. Conversão de R$ 100 para dólar: US$ ' . number_format(converterMoeda(100), 2, ',', '.') . '<br>';
echo '8. Telefone formatado: ' . formatarTelefone('19987654321') . '<br>';
echo '9. Saudação: ' . gerarSaudacao(14) . '<br>';
echo '10. Validação de senha: ' . (validarSenhaForte('Senha@123') ? 'Senha forte' : 'Senha fraca') . '<br>';

$produtos = [
    ['nome' => 'Notebook', 'quantidade' => 1, 'valor_unitario' => 3200.00],
    ['nome' => 'Mouse sem fio', 'quantidade' => 2, 'valor_unitario' => 120.00],
    ['nome' => 'Teclado mecânico', 'quantidade' => 1, 'valor_unitario' => 450.00]
];

$relatorio = processarPedido($produtos);

echo '<h2>Desafio - Processamento de Pedidos</h2>';
echo '<h3>Subtotais dos produtos</h3>';
foreach ($relatorio['subtotais'] as $produto) {
    echo 'Produto: ' . $produto['nome'] . '<br>';
    echo 'Quantidade: ' . $produto['quantidade'] . '<br>';
    echo 'Valor unitário: ' . moeda($produto['valor_unitario']) . '<br>';
    echo 'Subtotal: ' . moeda($produto['subtotal']) . '<br><br>';
}

echo '<h3>Relatório final</h3>';
echo 'Quantidade de produtos diferentes: ' . $relatorio['quantidade_produtos_diferentes'] . '<br>';
echo 'Quantidade total de itens: ' . $relatorio['quantidade_total_itens'] . '<br>';
echo 'Produto mais caro: ' . $relatorio['produto_mais_caro']['nome'] . '<br>';
echo 'Produto com maior subtotal: ' . $relatorio['produto_maior_subtotal']['nome'] . '<br>';
echo 'Total da compra: ' . moeda($relatorio['total_compra']) . '<br>';
echo 'Desconto aplicado: ' . moeda($relatorio['desconto']) . '<br>';
echo 'Frete: ' . ($relatorio['frete'] == 0 ? 'Grátis' : moeda($relatorio['frete'])) . '<br>';
echo 'Valor final da compra: ' . moeda($relatorio['valor_final']) . '<br>';