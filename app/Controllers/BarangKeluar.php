<?php

namespace App\Controllers;

use App\Models\BarangKeluarModel;
use App\Models\BarangModel;

class BarangKeluar extends BaseController
{
    protected $barangKeluarModel;
    protected $barangModel;

    public function __construct()
    {
        $this->barangKeluarModel = new BarangKeluarModel();
        $this->barangModel = new BarangModel(); // untuk data barang dropdown
    }

    public function index()
    {
        $data['barangKeluarList'] = $this->barangKeluarModel->getBarangKeluarWithBarang();
        return view('pages/barang_keluar', $data);
    }

    public function create()
    {
        $data['barangList'] = $this->barangModel->findAll();
        return view('pages/barang_keluar_create', $data);
    }

    public function store()
    {
        $post = $this->request->getPost();

        if (empty($post['barang_id']) || empty($post['jumlah'])) {
            return redirect()->back()->with('error', 'Barang dan jumlah wajib diisi.');
        }

        $data = [
            'barang_id' => $post['barang_id'],
            'jumlah'    => $post['jumlah'],
            'tanggal'   => $post['tanggal'] ?? date('Y-m-d'),
            'keterangan'=> $post['keterangan'] ?? null,
        ];

        $this->barangKeluarModel->save($data);

        return redirect()->to('/barang/keluar')->with('success', 'Data barang keluar berhasil disimpan.');
    }
}
