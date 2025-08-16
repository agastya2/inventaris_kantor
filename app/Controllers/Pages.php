<?php

namespace App\Controllers;

use App\Libraries\DummyData;
use App\Models\BarangModel;


class Pages extends BaseController
{

    public function dashboard()
    {
        return view('pages/dashboard');
    }

    public function barangMasuk()
    {
        return view('pages/barang_masuk');
    }

    public function barangKeluar()
    {
        return view('pages/barang_keluar');
    }

    public function laporan()
    {
        return view('pages/laporan');
    }
//    public function barang()
//    {
//        return view('pages/barang');
//    }

//    public function peminjaman()
//    {
//        return view('pages/peminjaman');
//    }

    public function peminjaman()
    {
        $peminjamanList = DummyData::getPeminjaman();
        return view('pages/peminjaman', compact('peminjamanList'));
    }

}