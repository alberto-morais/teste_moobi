<!DOCTYPE html>
<html>

<?php require_once(__DIR__ . '/../includes/head.php'); ?>

<body>
<!-- Sidenav -->
<?php require_once(__DIR__ . '/../includes/menu.php'); ?>
<!-- Main content -->
<div class="main-content" id="panel">
    <?php if (isset($this->session['flash']['notify']) && !empty($this->session['flash'])): ?>
        <?php foreach ($this->session['flash']['notify'] as $alert): ?>
            <div class="alert alert-<?= $alert['type'] ?> alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><?= $alert['title'] ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <?php if (isset($this->session['flash']['notify']) && !empty($this->session['flash'])): ?>
            <?php foreach ($this->session['flash']['notify'] as $alert): ?>
                <div class="alert alert-<?= $alert['type'] ?> alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><?= $alert['title'] ?></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- Topnav -->
        <?php require_once(__DIR__ . '/../includes/nav_bar_user.php'); ?>
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Pedidos</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboards</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('pedidos') ?>">Pedidos</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="<?= base_url('pedidos') ?>" class="btn btn-sm btn-neutral">Voltar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header -->
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Cadastrar Pedido</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('pedido/salvar') ?>" method="POST">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h6 class="heading-small text-muted mb-4">Informações do Pedido</h6>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="qtd">Revendedor</label>
                                                        <select name="id_revendedor" required
                                                                class="<?= (isset($this->session['usuario']->revend)) ? 'disable readonly' : '' ?> form-control"
                                                                id="">
                                                            <option disabled value="" selected> Selecione o Revendedor
                                                            </option>
                                                            <?php foreach ($revendedores as $revendedor): ?>
                                                                <?php if (isset($this->session['usuario']->revend) and $this->session['usuario']->id == $revendedor->id):?>
                                                                    <option <?= ($this->session['usuario']->id == $revendedor->id) ? 'selected' : ''?>
                                                                             value="<?= $revendedor->id ?>"> <?= "{$revendedor->revendedor}" ?>
                                                                    </option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="qtd">Date</label>
                                                        <input type="text" name="data" class="form-control date"
                                                               disabled
                                                               value="<?= date('d-m-Y h:i:s') ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <label for="qtd">Valor do pedido</label>
                                                        <input type="text" name="valor_pedido"
                                                               class="form-control money disabled" readonly
                                                               value="<?= formatCurrency(0) ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 repeater-default">
                                                    <div class="row">
                                                        <div data-repeater-list="produto" class="col-lg-12">
                                                            <div data-repeater-item="">
                                                                <div class="row">
                                                                    <div class="col-lg-8">
                                                                        <div class="form-group">
                                                                            <label for="prod">Produtos</label>
                                                                            <select required name="id"
                                                                                    class="form-control produtos">
                                                                                <option value="" selected> Selecione
                                                                                    os Produtos
                                                                                </option>
                                                                                <?php foreach ($produtos as $produto): ?>
                                                                                    <option
                                                                                            data-valor="<?= $produto->preco ?>"
                                                                                            data-qtd="<?= $produto->quantidade ?>"
                                                                                            value="<?= $produto->id ?>"> <?= "{$produto->nome} | valor [" . formatCurrency($produto->preco) . "] | qtd[{$produto->quantidade}] " ?></option>
                                                                                <?php endforeach; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label for="qtd">Quantidade</label>
                                                                                    <input type="text"
                                                                                           name="qtd" required
                                                                                           class="form-control numero-qtd qtd"
                                                                                           placeholder="2">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-block"
                                                                                           for="qtd">&nbsp;</label>
                                                                                    <button type="button"
                                                                                            data-repeater-delete=""
                                                                                            class="btn btn-icon btn-danger float-right">
                                                                                        <span class="btn-inner--icon"><i
                                                                                                    class="ni ni-fat-remove"></i></span>
                                                                                        <span class="btn-inner--text">Remove</span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <button type="button" data-repeater-create=""
                                                                    class="btn btn-icon btn-primary m-auto d-block">
                                                                            <span class="btn-inner--icon"><i
                                                                                        class="ni ni-fat-add"></i></span>
                                                                <span class="btn-inner--text">Adicionar Produto</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 border-left">
                                            <h1 class="text-center">Finalizar Pedido</h1>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="prod">Formas de Pagamento</label>
                                                    <select required name="id_tp_pagamento" class="form-control"
                                                            id="forma-pagamento">
                                                        <option value="" selected> Selecione a Forma de Pagamento
                                                        </option>
                                                        <?php foreach ($formaPagamento as $tp_pagamento): ?>
                                                            <option value="<?= $tp_pagamento->id ?>"> <?= $tp_pagamento->nome ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="display: none" id="parcelas">
                                                    <label for="prod">Parcelas</label>
                                                    <select name="parcelas" class="form-control">
                                                        <option value="1"> x1</option>
                                                        <option value="2"> x2</option>
                                                        <option value="3"> x3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="prod">Valor a Pagar</label>
                                                    <input class="form-control disabled money" name="valor_venda"
                                                           value="" required readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4"/>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button class="btn btn-icon btn-primary float-right" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                                <span class="btn-inner--text">Salvar</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php require_once(__DIR__ . '/../includes/footer.php'); ?>
        </div>
    </div>
    <?php require_once(__DIR__ . '/../includes/scripts.php'); ?>
    <script>
        $(function () {
            'use strict';
            // Default


            $('.repeater-default').repeater({
                show: function () {

                    $(this).slideDown();
                    mask();
                },
                hide: function (remove) {
                    $(this).slideUp(remove);
                },
                isFirstItemUndeletable: true
            })

            function calculo() {
                var valor_total = 0;
                $('select.produtos').each(function (index, element) {
                    var valor_pedido = $(element).find('option:selected').data('valor');
                    var elementQtdVendas = $(element).closest('[data-repeater-item]').find('.qtd');
                    var qtd_venda = ($(elementQtdVendas).val() == '') ? 0 : $(elementQtdVendas).val();
                    valor_total += (parseFloat(valor_pedido) * parseFloat(qtd_venda))
                })
                valor_total = removeMaskMoney(valor_total)
                $('[name="valor_pedido"]').val(valor_total);
                $('[name="valor_venda"]').val(valor_total);
            }


            $(document).on('keyup', '.qtd', function () {
                var pai = $(this).closest('[data-repeater-item]')
                var select = $(pai).find('select.produtos')
                var qtd_estoque = $(select).find('option:selected').data('qtd');
                var qtd_venda = $(this).val()
                if (qtd_venda > qtd_estoque) {
                    alert('Quantidade maior que o estoque!');
                    $(this).val('')
                    calculo()
                    mask();
                    return false;
                }
                calculo()
                mask();
            })

            $('#forma-pagamento').change(function () {
                if ($(this).val() == 2) {
                    $('#parcelas select').attr('required', true)
                    $('#parcelas').fadeIn();
                    $('[name="valor_venda"]').val($('[name="valor_pedido"]').val())
                } else {
                    $('#parcelas select').removeAttr('required')
                    $('#parcelas').fadeOut();
                }

                if ($(this).val() == 1) {
                    var preco = removeMaskMoney($('[name="valor_pedido"]').val());
                    var porcentagem = 10;
                    var total = preco * (porcentagem / 100);
                    $('[name="valor_venda"]').val((preco - total))
                    mask()
                }

                if ($(this).val() == 3) {
                    var preco = removeMaskMoney($('[name="valor_pedido"]').val());
                    var porcentagem = 5;
                    var total = preco * (porcentagem / 100);
                    $('[name="valor_venda"]').val((preco - total))
                    mask()
                }

            })
        });
    </script>
</body>

</html>