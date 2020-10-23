<?php defined('BASEPATH') or exit('URL inválida.');

/**
 * Formata array para enviar para o retorno do ajax
 */
function response(array $data): void
{
    header('Content-Type: application/json');
    echo json_encode($data, JSON_NUMERIC_CHECK | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    exit;
}

/**
 * Formata Array para montar o grafico do estoque com movimentos diarios
 *
 * @param array Resultado do banco para iterar
 * @return array Com resultados iterados para montar o grafico
 */
function iterarArrayDiaria(array $arr)
{
    $dias = [];
    $entrada = [];
    $saida = [];
    foreach ($arr as $row) {

        $dias[] = $row['dia'];
        $entrada[] = $row['entrada'];
        $saida[] = $row['saida'];
    }
    return $result = [
        'dias' => $dias,
        'entrada' => $entrada,
        'saida' => $saida
    ];
}