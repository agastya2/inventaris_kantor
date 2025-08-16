<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Pengembalian</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman Belum Dikembalikan</h6>
        </div>
        <div class="card-body">
            <?php if (!empty($peminjamanList)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
<!--                            <th>Nama Peminjam</th>-->
                            <th>Nama Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($peminjamanList as $index => $pinjam): ?>
                            <tr>
                                <td><?= esc($index + 1) ?></td>
<!--                                <td>--><?php //= esc($pinjam['user_name']) ?><!--</td>-->
                                <td><?= esc($pinjam['nama_barang']) ?></td>
                                <td><?= esc($pinjam['tanggal_pinjam']) ?></td>
                                <td><?= esc($pinjam['status']) ?></td>
                                <td>
                                    <a href="<?= base_url('pengembalian/proses/' . $pinjam['id']) ?>" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin mengembalikan barang ini?')">Kembalikan</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-center">Tidak ada peminjaman yang harus dikembalikan.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
