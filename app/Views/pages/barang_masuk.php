<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Barang Masuk</h1>
    <p>Data barang yang baru masuk ke gudang.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Barang Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if (!empty($barangMasukList)): ?>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Tanggal Masuk</th>
                            <th>Keterangan</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($barangMasukList as $index => $bm): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= esc($bm['kode_barang']) ?></td>
                                <td><?= esc($bm['nama_barang']) ?></td>
                                <td><?= esc($bm['jumlah']) ?></td>
                                <td><?= esc($bm['tanggal']) ?></td>
                                <td><?= esc($bm['keterangan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center">Data barang masuk tidak tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
