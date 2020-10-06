<?php
defined('BASEPATH') or exit('URL inválida.');
?>
<?php $this->load->view('includes/head'); ?>

<body class="fundo-login">
    <!-- Login Content -->
    <div class="container tela-centro">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Criar uma Conta</h1>
                                </div>
                                <!-- error validation fields -->
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
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo $message; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>

                                <?php echo form_open('user/insertUser'); ?>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="text_name_complete" id="text_name_complete" required placeholder="Nome Completo">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="text_username" id="text_username" required placeholder="Login">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="text_password" id="text_password" required placeholder="Escolha uma senha">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="text_password2" id="text_password2" required placeholder="Repita a senha">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-block" type="submit">Finalizar</button>
                                </div>
                                <div class="form-group">
                                    <a href="<?= site_url('user') ?>" class="btn btn-secondary btn-block">Cancelar</a>
                                </div>
                                <?php echo form_close(); ?>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Importa outras views complementares  -->
    <?php $this->load->view('includes/footer'); ?>
    <?php $this->load->view('includes/scripts'); ?>

</body>

</html>