<!DOCTYPE html>
<html>

<?php require_once(__DIR__.'/../includes/head.php') ;?>

<body>
<!-- Sidenav -->
<?php require_once(__DIR__.'/../includes/menu.php') ;?>
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
        <?php require_once(__DIR__.'/../includes/nav_bar_user.php') ;?>
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Revendedores</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url()?>">Dashboards</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('revendedores')?>">Revendedores</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="<?= base_url('revendedores') ?>" class="btn btn-sm btn-neutral">Voltar</a>
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
                                    <h3 class="mb-0">Cadastrar Revendedor </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url('revendedor/salvar')?>" method="POST">
                            <h6 class="heading-small text-muted mb-4">Informações do Revendedor</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Nome do
                                                    Revendedor</label>
                                                <input type="text" id="input-nome" class="form-control" name="revendedor"
                                                       placeholder="Revendedor Jhon" value="<?= old('email')?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email</label>
                                                <input type="text" name="email" class="form-control"
                                                       placeholder="revendndor@teste.com" value="<?= old('email')?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Senha</label>
                                                <input type="password" name="senha" class="form-control" value="">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php require_once(__DIR__.'/../includes/footer.php') ;?>
        </div>
    </div>
    <?php require_once(__DIR__.'/../includes/scripts.php') ;?>
</body>

</html>