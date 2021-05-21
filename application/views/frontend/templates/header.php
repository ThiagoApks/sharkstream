<header style="background: #1d1d1d!important" class="topbar bg-dark">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header bg-dark">
            <a class="navbar-brand" href="dashboard.html">
                <span class="mx-auto logo-text">
                    <img width="100px" class="mx-auto" src="<?=base_url('assets/logo_light.png')?>" alt="homepage" />
                </span>
            </a>
            <a class="nav-toggler text-light d-block d-md-none"
            href="javascript:void(0)"><i class="fa-2x ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <?php if($page_name !== "login"): ?>
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="px-3">
                        <a class="noshadow btn btn-info" href="<?=base_url("main/signout")?>">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
</header>
<aside class="left-sidebar bg-dark">
    <div class="scroll-sidebar">
        <?php if($page_name !== "login"): ?>
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url("")?>" aria-expanded="false">
                            <i class="far fa-home" aria-hidden="true"></i>
                            <span class="hide-menu">Início</span>
                        </a>
                    </li>
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url("links")?>" aria-expanded="false">
                            <i class="far fa-film" aria-hidden="true"></i>
                            <span class="hide-menu">Links</span>
                        </a>
                    </li>
                    <?php if($this->crud_model->getRole() == 2): ?>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url("new_link")?>" aria-expanded="false">
                                <i class="far fa-plus" aria-hidden="true"></i>
                                <span class="hide-menu">Criar link</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url("categorias")?>" aria-expanded="false">
                            <i class="far fa-list" aria-hidden="true"></i>
                            <span class="hide-menu">Categorias</span>
                        </a>
                    </li>
                    <?php if($this->crud_model->getRole() == 2): ?>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url("new_cat")?>" aria-expanded="false">
                                <i class="far fa-plus" aria-hidden="true"></i>
                                <span class="hide-menu">Criar categoria</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="sidebar-item pt-2">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url("usuarios")?>" aria-expanded="false">
                            <i class="far fa-users" aria-hidden="true"></i>
                            <span class="hide-menu">Usuários</span>
                        </a>
                    </li>
                    <?php if($this->crud_model->getRole() == 2): ?>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url("listas")?>" aria-expanded="false">
                                <i class="far fa-list" aria-hidden="true"></i>
                                <span class="hide-menu">Listas</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?=base_url("config")?>" aria-expanded="false">
                                <i class="far fa-cogs" aria-hidden="true"></i>
                                <span class="hide-menu">Configuração</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <hr>
            <center>
                <span class="text-center mx-auto text-muted">v1.0</span>
            </center>
        <?php endif; ?>
    </div>
</aside>
<div class="page-wrapper">