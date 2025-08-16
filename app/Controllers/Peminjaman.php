<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;

class Peminjaman extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new PeminjamanModel();
    }

    public function index()
    {
        $peminjamanList = $this->model->getPeminjamanBarang();
        return view('pages/peminjaman', ['peminjamanList' => $peminjamanList]);
    }

    public function create()
    {
        // Tampilkan form tambah peminjaman
        // Kalau perlu, kirim data barang untuk dropdown
        $barangModel = new \App\Models\BarangModel();
        $data['barangList'] = $barangModel->findAll();

        return view('pages/tambah_peminjaman', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();

        // Validasi data sesuai kebutuhan, misal:
        $validation = \Config\Services::validation();
        $validation->setRules([
            'barang_id' => 'required',
            'user_id' => 'required',
            'jumlah' => 'required|integer',
            'tanggal_pinjam' => 'required|valid_date',
            'tanggal_kembali' => 'required|valid_date',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', 'Data tidak valid.');
        }

        $this->model->save([
            'barang_id' => $data['barang_id'],
            'user_id' => $data['user_id'],
            'jumlah' => $data['jumlah'],
            'tanggal_pinjam' => $data['tanggal_pinjam'],
            'tanggal_kembali' => $data['tanggal_kembali'],
            'status' => 'dipinjam',
        ]);

        return redirect()->to('/peminjaman')->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['peminjaman'] = $this->model->find($id);
        return view('pages/peminjaman_edit', $data);
    }

    public function update($id)
    {
        $this->model->update($id, $this->request->getPost());
        return redirect()->to('/peminjaman');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/peminjaman');
    }
}
