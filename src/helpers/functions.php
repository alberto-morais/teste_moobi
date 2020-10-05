<?php

function formatCurrency($valor)
{
    if (strpos($valor, '$') !== false) {
        parseCurrencyFloat($valor);
    }

    $moeda = '' ;
    if(!isset($moeda) || empty($moeda)){
        $moeda = 'pt_BR';
    }
    $formatter = new NumberFormatter($moeda, NumberFormatter::CURRENCY);
    return $formatter->format($valor);

}

function old($name)
{
    if (!empty($_POST))  $post = $_POST;
    return $something = isset($post[$name]) ? $post[$name] : NULL;
}

function parseCurrencyToFloat($valor)
{
    if (is_float($valor)){
        return $valor;
    }

    if (!empty($valor) or is_string($valor)) {
        $valor = str_replace(".", "", $valor);
        $valor = str_replace(",", ".", $valor);
        $valor = str_replace("R$", "", $valor);
        $valor = str_replace("\xc2\xa0", "", $valor);
        $valor = (float) $valor;
    } else {
        $valor = 0;
    }

    return $valor;
}

function formarDateBr($date)
{
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    return strftime('%d/%m/%Y %H:%M:%S', strtotime($date));
}