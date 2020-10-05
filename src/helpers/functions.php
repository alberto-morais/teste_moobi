<?php

function formatCurrency($valor)
{
    if (strpos($valor, '$') !== false) {
        parseCurrencyFloat($valor);
    }

    $moeda = '';
    if (!isset($moeda) || empty($moeda)) {
        $moeda = 'pt_BR';
    }
    $formatter = new NumberFormatter($moeda, NumberFormatter::CURRENCY);
    return $formatter->format($valor);

}

function old($name)
{
    if (!empty($_POST)) $post = $_POST;
    return $something = isset($post[$name]) ? $post[$name] : NULL;
}

function parseCurrencyToFloat($valor)
{
    if (is_float($valor)) {
        return $valor;
    }

    if (!empty($valor) or is_string($valor)) {
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        $valor = str_replace("R$", "", $valor);
        $valor = str_replace("\xc2\xa0", "", $valor);
        $valor = (float)$valor;
    } else {
        $valor = 0;
    }

    return $valor;
}

function removeAccented($str)
{
    $unwanted_array = array('Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
        'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
        'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
        'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y');
    return strtr($str, $unwanted_array);
}

function nameColumnDB($string)
{
    $string = removeAccented($string);
    return  strtolower(trim(str_replace(' ', '_', $string)));
}

function formarDateBr($date)
{
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    return strftime('%d/%m/%Y %H:%M:%S', strtotime($date));
}