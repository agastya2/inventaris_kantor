<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;

class Pengembalian extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PeminjamanModel();
    }

    public function index()
    {
        // Tampilkan daftar peminjaman yang belum dikembalikan
        $data['peminjamanList'] = $this->model->getDipinjam();

        return view('pages/pengembalian', $data);
    }

    public function proses($id)
    {
        if ($this->model->setPengembalian($id)) {
            return redirect()->to('/pengembalian')->with('success', 'Pengembalian berhasil diproses.');
        } else {
            return redirect()->to('/pengembalian')->with('error', 'Gagal memproses pengembalian.');
        }
    }
}
