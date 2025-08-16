<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangModel;  // Jika ingin akses data barang (opsional)

class BarangMasuk extends BaseController
{
    protected $barangMasukModel;
    protected $barangModel;

    public function __construct()
    {
        $this->barangMasukModel = new BarangMasukModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data['barangMasukList'] = $this->barangMasukModel->getBarangMasukWithBarang();

        return view('pages/barang_masuk', $data);
    }

}
