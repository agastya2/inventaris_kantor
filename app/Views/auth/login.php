<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Inventaris Kantor</title>

    <!-- SB Admin 2 CSS -->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

        <div class="col-xl-5 col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-5">

                    <!-- Flashdata Error -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger text-center">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <!-- Login Form -->
                    <div class="text-center mb-4">
                        <h1 class="h4 text-gray-900">Sistem Informasi Inventaris Barang     Kantor</h1>
                        <p class="text-muted">Silakan login untuk masuk</p>
                    </div>

                    <form action="<?= base_url('login') ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="username" placeholder="Masukkan Username..." required value="<?= old('username') ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password..." required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>

                    <hr>
                    <div class="text-center">
                        <small>© <?= date('Y') ?> Inventaris Kantor</small>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<!-- SB Admin 2 JS -->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

</body>

</html>
