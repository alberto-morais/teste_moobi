<!DOCTYPE html>
<html>

<?php require_once(__DIR__.'/../includes/head.php') ;?>

<body>
<!-- Sidenav -->
<?php require_once(__DIR__.'/../includes/menu.php') ;?>
<!-- Main content -->
<div class="main-content" id="panel">
    <?php require_once(__DIR__.'/../includes/alert_notify.php') ;?>
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
                        <h6 class="h2 text-white d-inline-block mb-0">Pedidos</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url()?>">Dashboards</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('pedidos')?>">Pedidos</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Editar</li>
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
                                <h3 class="mb-0">Cadastrar Produto
                                    <?php if (!isset($this->session['usuario']->revend)): ?>
                                        <div class="float-right">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input <?= (!isset($this->session['usuario']->revend)) ? 'checked' : '' ?>
                                                    type="radio" id="customRadioInline1" value="1" name="user"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                       for="customRadioInline1">Usuário</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" value="2" name="user"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline2">Revendedor</label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">Informações do Produtos</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nome do
                                                Produto</label>
                                            <input type="text" id="input-nome" class="form-control" name="nome"
                                                   placeholder="Carro com controler remoto" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Preço</label>
                                            <input type="text" id="input-preço" name="preco" class="form-control money"
                                                       placeholder="R$ 10,00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"/>
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Campos Personalizados</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Nome do
                                                Produto</label>
                                            <input type="text" id="input-nome" class="form-control" name="nome"
                                                   placeholder="Carro com controler remoto" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Preço</label>
                                            <input type="email" id="input-preço" name="preco" class="form-control"
                                                   placeholder="R$ 10,00">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4"/>
                            <!-- Description -->
                            <h6 class="heading-small text-muted mb-4">Descrição</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <textarea rows="4" class="form-control" name="descricao" placeholder="Descrição">
                                    </textarea>
                                </div>
                            </div>
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