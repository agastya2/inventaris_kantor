<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .form-container {
        max-width: 700px;
        margin: 0 auto 40px;
        padding: 30px 40px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        font-size: 1.1rem;
    }

    .form-group label {
        font-size: 1.15rem;
        font-weight: 600;
    }

    .form-control-user {
        border-radius: 4px !important;
        border: 1.5px solid #ced4da !important;
        padding: 10px 12px;
        transition: border-color 0.3s ease;
        font-size: 1.1rem;
    }

    input.form-control-user,
    textarea.form-control-user {
        font-size: 1.25rem !important;
        height: calc(1.25rem + 1.25rem + 12px) !important;
        padding: 10px 12px !important;
    }


    .form-control-user:focus {
        border-color: #4e73df !important;
        box-shadow: none !important;
    }

    .btn-custom {
        border-radius: 20px !important;
        min-width: 120px;
        padding: 10px 28px;
        font-weight: 600;
        font-size: 1.15rem;
    }

    .btn-custom + .btn-custom {
        margin-left: 15px;
    }
</style>


<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 text-center">Edit Barang</h1>

    <div class="form-container">
        <form
                action="<?= !empty($barang['id']) ? '/barang/update/' . $barang['id'] : '#' ?>"
                method="post"
                class="user"
        >
            <?= csrf_field() ?>

            <div class="form-group row">
                <label for="kode_barang" class="col-sm-3 col-form-label">Kode Barang <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" name="kode_barang" id="kode_barang" class="form-control form-control-user"
                           value="<?= esc($barang['kode_barang']) ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_barang" class="col-sm-3 col-form-label">Nama Barang <span class="text-danger">*</span></label>
                <div class="col-sm-9">
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control form-control-user"
                           value="<?= esc($barang['nama_barang']) ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="kategori_id" class="col-sm-3 col-form-label">Kategori ID</label>
                <div class="col-sm-9">
                    <input type="number" name="kategori_id" id="kategori_id" class="form-control form-control-user"
                           value="<?= esc($barang['kategori_id']) ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                <div class="col-sm-9">
                    <input type="number" name="stok" id="stok" class="form-control form-control-user"
                           value="<?= esc($barang['stok']) ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="kondisi" class="col-sm-3 col-form-label">Kondisi</label>
                <div class="col-sm-9">
                    <input type="text" name="kondisi" id="kondisi" class="form-control form-control-user"
                           value="<?= esc($barang['kondisi']) ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                <div class="col-sm-9">
                    <input type="text" name="lokasi" id="lokasi" class="form-control form-control-user"
                           value="<?= esc($barang['lokasi']) ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <textarea name="keterangan" id="keterangan" rows="4" class="form-control form-control-user"><?= esc($barang['keterangan']) ?></textarea>
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-sm-9 offset-sm-3 d-flex">
                    <button type="submit" class="btn btn-primary btn-custom">
                        Update
                    </button>
                    <a href="/barang" class="btn btn-secondary btn-custom">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
