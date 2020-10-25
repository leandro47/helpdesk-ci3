<?php
defined('BASEPATH') or exit('URL inválida.');
?>

<?php $this->load->view('includes/head') ?>

<nav class="navbar navbar-dark btn-3">
  <a class="navbar-brand" href="#">
    <img src="<?= base_url('assets/img/logo/logo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    HelpDesk
  </a>
</nav>

<div class="container-fluid background-chamado">
  <div class="row">
    <div class="col-sm div-centro">
      <a class="pulsingButton" href="<?= site_url('novochamado/chamado') ?>" role="button">Novo chamado</a>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>

<?php $this->load->view('includes/footer') ?>
<?php $this->load->view('includes/scripts') ?>

</body>

</html>