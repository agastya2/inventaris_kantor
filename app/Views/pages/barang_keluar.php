<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Barang Keluar</h1>
    <p>Data barang yang keluar dari gudang.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Barang Keluar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if (!empty($barangKeluarList)): ?>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Keluar</th>
                            <th>Keterangan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($barangKeluarList as $index => $bk): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= esc($bk['kode_barang']) ?></td>
                                <td><?= esc($bk['nama_barang']) ?></td>
                                <td><?= esc($bk['jumlah']) ?></td>
                                <td><?= esc($bk['tanggal']) ?></td>
                                <td><?= esc($bk['keterangan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">Data barang keluar tidak tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
