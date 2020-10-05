<!DOCTYPE html>
<html>

<?php require_once(__DIR__.'/../includes/head.php') ;?>

<body>
<!-- Sidenav -->
<?php require_once(__DIR__.'/../includes/menu.php') ;?>
<!-- Main content -->
<div class="main-content" id="panel">
    <?php require_once(__DIR__.'/../includes/alert_notify.php') ;?>
    <!-- Topnav -->
    <?php require_once(__DIR__.'/../includes/nav_bar_user.php') ;?>
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
                        <a href="<?= base_url('pedido/novo') ?>" class="btn btn-sm btn-neutral">Novo</a>
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
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Cod</th>
                                <th scope="col" class="sort" data-sort="name">Revendedor</th>
                                <th scope="col" class="sort" data-sort="name">Data</th>
                                <th scope="col" class="sort" data-sort="status">Tipo de Pagamento</th>
                                <th scope="col" class="sort" data-sort="budget">Parcelas</th>
                                <th scope="col" class="sort" data-sort="budget">status</th>
                                <th scope="col" class="text-right">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php if (!empty($pedidos)): ?>
                                <?php foreach ($pedidos as $pedido)  : ?>
                                    <tr>

                                        <td class="budget">
                                            <?= $pedido->id ;?>
                                        </td>
                                        <td class="budget">
                                            <?= "$pedido->revendedor $pedido->usuario" ;?>
                                        </td>
                                        <td class="budget">
                                            <?= formarDateBr($pedido->data) ;?>
                                        </td>
                                        <td class="budget">
                                            <?= $pedido->nome ;?>
                                        </td>
                                        <td class="budget">
                                            <?= $pedido->parcelas ;?>
                                        </td>
                                        <td class="budget">
                                            <?= ($pedido->status == 1) ? 'Venda Realizada' :'' ;?>
                                            <?= ($pedido->status == 2) ? 'Pendente' :'' ;?>
                                            <?= ($pedido->status == 3) ? 'Finalizada' :'' ;?>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                       href="<?= base_url("pedido/visualizar/{$pedido->id}") ?>">Visualizar Itens
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="12" class="text-center">
                                        Não há registros!
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <?php require_once(__DIR__ . '/../includes/paginate.php'); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once(__DIR__.'/../includes/footer.php') ;?>
    </div>
</div>
<?php require_once(__DIR__.'/../includes/scripts.php') ;?>
</body>

</html>