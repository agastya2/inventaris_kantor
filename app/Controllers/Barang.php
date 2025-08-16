<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data['barangList'] = $this->barangModel->findAll();
        return view('pages/barang', $data);
    }

    public function create()
    {
        return view('pages/barang_create');
    }

    public function store()
    {
        $post = $this->request->getPost();

        if (empty($post['kode_barang']) || empty($post['nama_barang'])) {
            return redirect()->back()->with('error', 'Kode dan Nama Barang wajib diisi.');
        }

        $this->barangModel->save($post);
        $barangId = $this->barangModel->getInsertID();

        if (!empty($post['stok']) && $post['stok'] > 0) {
            $db = \Config\Database::connect();

            $db->table('barang_masuk')->insert([
                'barang_id' => $barangId,
                'jumlah' => (int)$post['stok'],
                'keterangan' => 'Stok awal barang baru',
                'tanggal' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->to('/barang')->with('success', 'Data barang berhasil disimpan.');
    }


    public function edit($id)
    {
        $barang = $this->barangModel->find($id);

        if (!$barang) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Barang dengan ID $id tidak ditemukan");
        }

        return view('pages/barang_edit', ['barang' => $barang]);
    }

    public function update($id)
    {
        $post = $this->request->getPost();

        $this->barangModel->update($id, $post);
        return redirect()->to('/barang')->with('success', 'Data barang berhasil diupdate.');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $barang = $this->barangModel->find($id);

        if (!$barang) {
            return redirect()->to('/barang')->with('error', 'Barang tidak ditemukan.');
        }

        if (!empty($barang['stok']) && $barang['stok'] > 0) {
            $db->table('barang_keluar')->insert([
                'barang_id'  => $id,
                'jumlah'     => (int) $barang['stok'],
                'keterangan' => 'Barang dihapus dari sistem',
                'tanggal'    => date('Y-m-d H:i:s'),
            ]);
        }

        $this->barangModel->delete($id);

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            return redirect()->to('/barang')->with('error', 'Gagal menghapus data barang.');
        }

        return redirect()->to('/barang')->with('success', 'Data barang berhasil dihapus dan stok tercatat keluar.');
    }


}
