<!DOCTYPE html>
<html>

<?php require_once(__DIR__.'/../includes/head.php') ;?>

<body>
<!-- Sidenav -->
<?php require_once(__DIR__.'/../includes/menu.php') ;?>
<!-- Main content -->
<div class="main-content" id="panel">
    <?php if (isset($this->session['flash']['alert']) && !empty($this->session['flash'])): ?>
        <?php foreach ($this->session['flash']['alert'] as $alert): ?>
            <div class="alert alert-<?= $alert['type'] ?> alert-dismissible fade show" role="alert">
                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                <span class="alert-text"><?= $alert['message'] ?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Topnav -->
    <?php require_once(__DIR__.'/../includes/nav_bar_user.php') ;?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Usuários</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Dashboards</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="<?= base_url('usuario/novo') ?>" class="btn btn-sm btn-neutral">Novo</a>
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
                        <h3 class="mb-0">Usários</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Nome</th>
                                <th scope="col" class="sort" data-sort="status">Preço</th>
                                <th scope="col" class="sort" data-sort="budget">Data</th>
                                <th scope="col" class="sort" data-sort="budget">status</th>
                                <th scope="col" class="text-right">Ações</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php if (!empty($produtos)): ?>
                                <?php foreach ($produtos as $produto)  : ?>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="./assets/img/theme/bootstrap.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Argon Design System</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            $2500 USD
                                        </td>
                                        <td>
                                            <?= date('d-m-Y') ?>
                                        </td>
                                        <td>
                                  <span class="badge badge-dot mr-4">
                                    <i class="bg-warning"></i>
                                    <span class="status">pending</span>
                                  </span>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item"
                                                       href="<?= base_url("produtos/edit/{$produto->id}") ?>">Editar</a>
                                                    <a class="dropdown-item"
                                                       href="<?= base_url("produtos/active/{$produto->id}") ?>">Atiavar</a>
                                                    <a class="dropdown-item"
                                                       href="<?= base_url("produtos/desactive/{$produto->id}") ?>">Desativar</a>
                                                    <a class="dropdown-item"
                                                       href="<?= base_url("produtos/delete/{$produto->id}") ?>">Remover</a>
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
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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