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

function removeMaskMoney(value) {
    value = String(value);
    var aux = value.replace('R$ ', '');
    aux = aux.replace(',', '.');
    aux = aux.replace(' ', '');
    return parseFloat(aux.replace('R$', '').replace(',', '.'));
}

function mask() {
    $('.money').maskMoney({
        prefix: 'R$ ',
        allowNegative: true,
        allowZero: true,
        thousands: '.',
        decimal: ',',
        affixesStay: true
    });
    $('.money').each(function(i, e){
        $(e).focus()
    })
    $('.data').mask('00/00/0000');
    $('.numero-qtd').mask('0000');
    $('.Valor').mask('R$ 000.000.000.000.000,00', {reverse: true, prefix: 'R$ '});
    $('.telefone').mask('(00) 0000-0000');
    $('.celmask').mask('(00) 00000-0000');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.tel').mask('(00) 00000-0000');
    $('[name="EndCEP"]').mask('00000-000');
    $('.cep').mask('00000-000');
    $('.rg').mask('0000000000000');
    $('.rg').mask('0000000000000');
    $('.cnpj').mask('00.000.000/0000-00');
    $('.cpf').mask('000.000.000-00');
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
    $('.numero-qtd').mask('0000');
})