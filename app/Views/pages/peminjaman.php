<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Peminjaman</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/peminjaman/create" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Peminjaman</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($peminjamanList)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <!-- Tambah kolom aksi jika ada -->
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($peminjamanList as $index => $pinjam): ?>
                            <tr>
                                <td><?= esc($index + 1) ?></td>
                                <td><?= esc($pinjam['user_name'] ?? $pinjam['user_id']) ?></td>
                                <td><?= esc($pinjam['nama_barang'] ?? $pinjam['barang_id']) ?></td>
                                <td><?= esc($pinjam['tanggal_pinjam']) ?></td>
                                <td><?= esc($pinjam['tanggal_kembali']) ?></td>
                                <td><?= esc($pinjam['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-center">Data peminjaman tidak tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
