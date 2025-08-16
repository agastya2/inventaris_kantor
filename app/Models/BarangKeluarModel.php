<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['barang_id', 'jumlah', 'tanggal', 'keterangan'];

    public function getBarangKeluarWithBarang()
    {
        return $this->select('barang_keluar.*, barang.kode_barang, barang.nama_barang')
            ->join('barang', 'barang.id = barang_keluar.barang_id')
            ->orderBy('barang_keluar.tanggal', 'DESC')
            ->findAll();
    }
}
