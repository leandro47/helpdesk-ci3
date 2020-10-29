<?php
defined('BASEPATH') or exit('URL inválida.');
?>

<?php $this->load->view('includes/head') ?>

<nav class="navbar navbar-dark btn-2">
    <a class="navbar-brand" href="#">
        <img src="<?= base_url('assets/img/logo/logo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        HelpDesk
    </a>
</nav>

<div class="container-fluid background-gradiente-inputchamado">
    <div class="d-sm-flex pt-5 pb-2 align-items-center justify-content-between">
        <h1 class="h3 text-1">Certo! Você só precisa preencher esses campos abaixo, prometo que vai ser rapidinho :).</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-5">
            <!-- Form Basic -->
            <div class="card mb-4">

                <div class="card-body">
                    <?php echo form_open('novochamado/abrirChamado'); ?>
                    <div class="row">
                        <div class="col-sm-12">

                            <!-- Validação de formulario  -->
                            <?php if (validation_errors()) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?php echo validation_errors(); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>

                            <!-- Message in login of user-->
                            <?php if (isset($message)) : ?>
                            <div class="alert alert-<?= $statusMessage ?> alert-dismissible fade show" role="alert">
                                <?php echo $message; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>

                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-4">Onde e quem?</h6>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputFilial">Qual é a filial</label>
                                <select class="form-control" id="inputFilial" name="inputFilial">
                                    <?php foreach ($filiais as $filial) : ?>
                                    <option value="<?= $filial['id'] ?>"><?= $filial['descricao'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="inputDepartamento">Departamento</label>
                                <select class="form-control" id="inputDepartamento" name="inputDepartamento">
                                    <?php foreach ($departamentos as $departamento) : ?>
                                    <option value="<?= $departamento['id'] ?>"><?= $departamento['descricao'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inputNome">Seu nome</label>
                                <input class="form-control form-control-lg mb-3" type="text" id="inputNome" name="inputNome" required placeholder="Ex: João da Silva">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <hr>
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-4">Agora precisamos saber oque aconteceu!</h6>
                            </div>
                            <div class="form-group">
                                <label for="inputTitulo">É sobre oque?</label>
                                <input class="form-control form-control-lg mb-3" type="text" id="inputTitulo" required name="inputTitulo" placeholder="Ex: Estou sem internet">
                            </div>
                            <div class="form-group">
                                <label for="inputDetalhes">Agora um pouco mais de detalhes...</label>
                                <textarea class="form-control" id="inputDetalhes" name="inputDetalhes" required rows="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-3">Abrir chamado</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('includes/footer') ?>
    <?php $this->load->view('includes/scripts') ?>

    </body>

    </html>