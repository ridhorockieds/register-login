<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('templates/head'); ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <?php $this->load->view('templates/alert'); ?>
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <p class="h1"><?= $title; ?></p>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Masuk untuk mengakses sistem</p>

                <form action="<?= base_url() ?>login/proses_login" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <p class="mb-0">
                    <a href="<?= base_url() ?>register" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <?php $this->load->view('templates/script'); ?>
</body>

</html>