<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Inventaris Kantor' ?></title>
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

<div id="wrapper">

    <?= $this->include('layouts/sidebar') ?>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

            <?= $this->include('layouts/topbar') ?>

            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            </div>

        </div>

        <?= $this->include('layouts/footer') ?>
    </div>

</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

</body>
</html>
