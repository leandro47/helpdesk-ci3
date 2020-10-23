<?php
defined('BASEPATH') or exit('URL inválida.');
?>

<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar bg-5 accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
        <img src="<?= base_url('assets/img/logo/logo2.png') ?>">
      </div>
      <div class="sidebar-brand-text menu-text mx-3">HelpDesk</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link menu-item" href="index.html">
        <i class="fas fa-home"></i>
        <span>Inicio</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading menu-text">
      Opções
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed menu-item" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
        <i class="fas fa-ticket-alt"></i>
        <span>Chamados</span>
      </a>
      <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Opções</h6>
          <a class="collapse-item" href="#!">Andamento</a>
          <a class="collapse-item" href="#!">Concluido</a>
          <a class="collapse-item" href="#!">Pendente</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link menu-item" href="ui-colors.html">
        <i class="fas fa-address-book"></i>
        <span>Administrativo</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link menu-item" href="ui-colors.html">
      <i class="far fa-file-pdf"></i>
        <span>Relatórios</span>
      </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading menu-text">
      Configurações
    </div>
    <li class="nav-item">
      <a class="nav-link collapsed menu-item" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
        <i class="fas fa-fw fa-columns"></i>
        <span>Usuários</span>
      </a>
      <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Opções</h6>
          <a class="collapse-item" href="login.html">Permissões</a>
          <a class="collapse-item" href="register.html">Cadastro</a>
        </div>
      </div>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
  </ul>
  <!-- Sidebar -->

  <div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
      <!-- TopBar -->
      <nav class="navbar navbar-expand bg-2 topbar mb-4 static-top">
        <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <span class="badge badge-danger badge-counter">1+</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">
               Notificações
              </h6>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                  <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                  </div>
                </div>
                <div>
                  <div class="small text-gray-500">December 12, 2019</div>
                  <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
              </a>
            </div>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img class="img-profile rounded-circle" src="<?= base_url('assets/img/boy.png') ?>" style="max-width: 60px">
              <span class="ml-2 d-none d-lg-inline text-white small"><?= $username ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <!-- Modal Logout -->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabelLogout">Isso é um adeus?!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Tem certeza que deseja sair?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Não</button>
              <a href="<?= site_url('user/logout'); ?>" class="btn btn-3">Sim</a>
            </div>
          </div>
        </div>
      </div>