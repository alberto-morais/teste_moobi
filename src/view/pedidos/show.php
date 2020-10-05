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
                                <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
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
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Produtos</h3>
                    </div>
                    <!-- Light table -->
                    <!-- title row -->
                    <div class="col-12 pl-lg-4 pb-4">
                        <div class="row">
                            <div class="col-3">
                                <div class="col-xs-12">
                                    <h2 class="page-header">
                                        <img style="background: silver; width: 150px;padding: 10px 20px; border-radius: 5px"
                                             src="<?= base_url('public/assets/img/logo.png') ?>"><br>
                                        <small class="pull-right">Desde: 01/09/1990</small>
                                    </h2>
                                </div><!-- /.col -->
                            </div>
                            <div class="col-3 invoice-info">
                                <div class="col-sm-12 invoice-col">
                                    Loja: <strong>MoobiToy </strong><br>
                                    <address>
                                        Address: Rua B, 90, Aracaju -SE <br>
                                        Phone: (79) 99999-9999 <br>
                                        Email:contato@moobtoy.com
                                    </address>
                                </div><!-- /.col -->
                            </div><!-- /.col -->
                            <div class="col-sm-3 invoice-col">
                                Cliente:
                                <strong>Alberto </strong><br>
                                <address>
                                    Address: Rua A, 49, Aracaju -SE <br>
                                    Phone: (79) 99999-9999 <br>
                                    Email:moraes_101@hotmail.com
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-3 invoice-col">
                                <b>Pedido #00<?= $pedido->id ?></b><br>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- Table row -->
                        <div class="col-12">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Quantidade</th>
                                        <th>Revendedor</th>
                                        <th>Produto</th>
                                        <th>Parcelas</th>
                                        <th>Forma Pagamento</th>
                                        <th>Preço</th>
                                        <th>Desconto</th>
                                        <th class="text-right">Sub Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($list_produtos as $item): ?>
                                        <tr>
                                            <td><?= $item->quantidade ?></td>
                                            <td><?= $pedido->revendedor ?></td>
                                            <td><?= $item->nome ?></td>
                                            <td><?= $pedido->parcelas ?></td>
                                            <td><?= $pedido->nome ?></td>
                                            <td><?= formatCurrency($item->preco) ?></td>
                                            <td>
                                                <?php if ($pedido->id_forma_pagamento == 1) {
                                                    $valor_row = ($item->preco * $item->quantidade);
                                                    $valor = $valor_row - $valor_row * (10 / 100);
                                                echo '10%';
                                                }
                                                ?>
                                                <?php
                                                if ($pedido->id_forma_pagamento == 3) {
                                                    $valor_row = ($item->preco * $item->quantidade);
                                                    $valor = $valor_row - $valor_row * (5 / 100);
                                                    echo '5%';
                                                }
                                                ?>
                                                <?php if ($pedido->id_forma_pagamento == 2) {
                                                    $valor = ($item->preco * $item->quantidade);
                                                    echo '0%';
                                                }?>
                                            </td>
                                            <td class="text-right"><?= formatCurrency($valor) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <div class="col-12">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                                <p class="lead">Data <?= formarDateBr($pedido->data) ?></p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>Total:</th>
                                            <td> <?= formatCurrency($pedido->valor_venda) ?></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <hr class="my-4"/>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-4 float-right">
                                    <a href="" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
                                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Enviar
                                        pagamento
                                    </button>
                                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i
                                                class="fa fa-download"></i> Gerar PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once(__DIR__ . '/../includes/footer.php'); ?>
    </div>
</div>
<?php require_once(__DIR__ . '/../includes/scripts.php'); ?>
</body>

</html>