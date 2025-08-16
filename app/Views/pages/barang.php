<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Barang</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <a href="/barang/create" class="btn btn-primary mb-3">Tambah Barang</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Barang</h6>
        </div>
        <div class="card-body">
            <?php if(!empty($barangList)): ?>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori ID</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($barangList as $index => $barang): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= esc($barang['kode_barang']) ?></td>
                                <td><?= esc($barang['nama_barang']) ?></td>
                                <td><?= esc($barang['kategori_id']) ?></td>
                                <td><?= esc($barang['stok']) ?></td>
                                <td><?= esc($barang['kondisi']) ?></td>
                                <td><?= esc($barang['lokasi']) ?></td>
                                <td><?= esc($barang['keterangan']) ?></td>
                                <td>
                                    <a href="/barang/edit/<?= $barang['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/barang/delete/<?= $barang['id'] ?>" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-center">Data barang tidak tersedia.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
