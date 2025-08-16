<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['barang_id', 'jumlah', 'tanggal', 'keterangan'];
    public function getBarangMasukWithBarang()
    {
        return $this->select('barang_masuk.*, barang.kode_barang, barang.nama_barang')
            ->join('barang', 'barang.id = barang_masuk.barang_id')
            ->orderBy('barang_masuk.tanggal', 'DESC')
            ->findAll();
    }
}
