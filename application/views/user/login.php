<?php
defined('BASEPATH') or exit('URL inválida.');
?>

<?php $this->load->view('includes/head'); ?>

<!-- Login Content -->
<div class="container-login">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
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
                                <?php echo form_open('user/login'); ?>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="text_name_user" required id="text_name_user" aria-describedby="emailHelp" placeholder="Nome de usuário">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="text_password" required id="text_password" placeholder="Senha">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-block">Entrar</button>
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
</div>
<!-- Login Content -->
<?php $this->load->view('includes/scripts'); ?>

</body>

</html>