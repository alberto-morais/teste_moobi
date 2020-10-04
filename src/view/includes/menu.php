<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="./assets/img/logo.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('pedidos') ?>">
                            <i class="ni ni-cart text-orange"></i>
                            <span class="nav-link-text">Pedidos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('revendedores') ?>">
                            <i class="ni ni-single-02 text-orange"></i>
                            <span class="nav-link-text">Revendedores</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('produtos') ?>">
                            <i class="ni ni-app text-orange"></i>
                            <span class="nav-link-text">Produtos</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('usuarios') ?>">
                            <i class="ni ni-circle-08 text-orange"></i>
                            <span class="nav-link-text">Usuarios</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>