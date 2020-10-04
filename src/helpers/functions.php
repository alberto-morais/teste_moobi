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