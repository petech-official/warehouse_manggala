<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Log in</title>
    <base href="<?= base_url('assets'); ?>/">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="container">
        <center>
            <div class="card" style="width: 60%;">
                <div class="card-body">

                    <div class="login-box center">
                        <div class="login-logo">
                            <img src="img/pt_manggala.jpg" alt="Manggala Logo">
                        </div>
                        <!-- /.login-logo -->
                        <H3>PT. Manggala Indopratama</H3>
                        <div class="card">

                            <div class="card-body login-card-body">
                                <p class="login-box-msg">Masuk untuk memulai sesi</p>
                                <?php if (session()->getFlashdata('msg')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('msg'); ?>
                                    </div>
                                <?php endif ?>
                                <form action="/loginAdmin/auth" method="post">
                                    <div class="input-group mb-3">
                                        <input type="username" class="form-control" placeholder="username" name="username">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                @
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" placeholder="password" name="password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-8">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="remember">
                                                <label for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div> -->
                                        <!-- /.col -->
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <a href="/loginAdmin/verifikasi">Lupa Password</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.login-card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>