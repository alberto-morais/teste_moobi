<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <ul class="navbar-nav align-items-center  ml-auto float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                                  <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="./assets/img/theme/team-4.jpg">
                                  </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><?= $this->session['usuario']->nome ?></span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-right">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bem vindo!</h6>
                        </div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>Perfil</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('usuario/logout') ?>" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>