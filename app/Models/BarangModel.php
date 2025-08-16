<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_barang', 'nama_barang', 'kategori_id', 'stok', 'kondisi', 'lokasi', 'keterangan'
    ];

    public function getBarangWithKategori()
    {
        return $this->select('barang.*, kategori.nama_kategori as kategori')
            ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
            ->findAll();
    }
}
