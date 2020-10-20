<?php
defined('BASEPATH') or exit('URL inválida.');
?>

<?php $this->load->view('includes/head') ?>
<?php $this->load->view('includes/menu') ?>

<div class="container-fluid" id="container-wrapper">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Inicio</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Inicio</li>
    </ol>
  </div>

</div>

<?php $this->load->view('includes/footer') ?>
<?php $this->load->view('includes/scripts') ?>

</body>

</html>