<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'barang_id', 'user_id', 'jumlah', 'tanggal_pinjam', 'tanggal_kembali', 'status'
    ];

    public function getPeminjamanBarang()
    {
        return $this->select('peminjaman.*, barang.nama_barang')
            ->join('barang', 'barang.id::text = peminjaman.barang_id', 'left', false)
            ->orderBy('peminjaman.id', 'ASC')
            ->findAll();
    }

    public function getDipinjam()
    {
        return $this->select('peminjaman.*, barang.nama_barang')
            ->join('barang', 'barang.id::text = peminjaman.barang_id', 'left', false)
            ->where('peminjaman.status', 'dipinjam')
            ->orderBy('peminjaman.id', 'ASC')
            ->findAll();
    }

    public function setPengembalian($id)
    {
        return $this->update($id, [
            'status' => 'dikembalikan',
            'tanggal_kembali' => date('Y-m-d'),
        ]);
    }

}
