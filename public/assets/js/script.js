function formatCurrency(valText) {
    if (isNaN(valText)) {
        return 0;
    }
    return parseFloat(valText).toLocaleString('pt-br', {style: 'currency', currency: 'BRL'});
}

function parseCurrencyToFloat(valText) {
    if (typeof valText == 'string') {
        valText = valText.replace(/\./g, '');
        valText = valText.replace(/\,/g, '.');
        valText = valText.replace(/[^0-9][^\w]/g, '');
        valText = valText.replace(/\s/g, '');
        valText = valText.replace(/\$/g,'');
        return parseFloat(valText);
    }
}

$(document).ready(function () {
    $('.money').maskMoney({
        prefix: 'R$ ',
        allowNegative: true,
        allowZero: true,
        thousands: '.',
        decimal: ',',
        affixesStay: true
    });
    $('.data_texto').mask("00/00/0000");
})