<?php

namespace App\Libraries;

class DummyData
{
    public static function getBarang()
    {
        return [
            [
                'nama' => 'Laptop Dell',
                'kode' => 'BRG001',
                'jumlah' => 5,
                'kondisi' => 'Baik',
                'lokasi' => 'Ruang IT',
            ],
            [
                'nama' => 'Printer Epson',
                'kode' => 'BRG002',
                'jumlah' => 2,
                'kondisi' => 'Baik',
                'lokasi' => 'Ruang Administrasi',
            ],
            [
                'nama' => 'Meja Kantor',
                'kode' => 'BRG003',
                'jumlah' => 10,
                'kondisi' => 'Cukup',
                'lokasi' => 'Ruang Kerja',
            ],
            [
                'nama' => 'Proyektor',
                'kode' => 'BRG004',
                'jumlah' => 1,
                'kondisi' => 'Baik',
                'lokasi' => 'Ruang Meeting',
            ],
            [
                'nama' => 'Kursi Kantor',
                'kode' => 'BRG005',
                'jumlah' => 15,
                'kondisi' => 'Baik',
                'lokasi' => 'Seluruh Ruangan',
            ],
        ];
    }

    public static function getPeminjaman()
    {
        return [
            [
                'nama' => 'Agas Pratama',
                'barang' => 'Laptop Dell',
                'tanggal_pinjam' => '2025-07-10',
                'tanggal_kembali' => '2025-07-12',
                'status' => 'Sudah Dikembalikan'
            ],
            [
                'nama' => 'Rina Wijaya',
                'barang' => 'Proyektor Epson',
                'tanggal_pinjam' => '2025-07-11',
                'tanggal_kembali' => '2025-07-15',
                'status' => 'Belum Dikembalikan'
            ],
            [
                'nama' => 'Budi Santoso',
                'barang' => 'Printer Canon',
                'tanggal_pinjam' => '2025-07-09',
                'tanggal_kembali' => '2025-07-10',
                'status' => 'Sudah Dikembalikan'
            ],
        ];
    }
}
