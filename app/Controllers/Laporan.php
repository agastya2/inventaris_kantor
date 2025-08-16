<?php

namespace App\Controllers;

use App\Models\BarangMasukModel;
use App\Models\BarangKeluarModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    protected $barangMasukModel;
    protected $barangKeluarModel;

    public function __construct()
    {
        $this->barangMasukModel = new BarangMasukModel();
        $this->barangKeluarModel = new BarangKeluarModel();
    }

    public function index()
    {
        $data['barangMasukList'] = $this->barangMasukModel
            ->select('barang_masuk.*, barang.kode_barang, barang.nama_barang')
            ->join('barang', 'barang.id = barang_masuk.barang_id', 'left')
            ->orderBy('barang_masuk.tanggal', 'DESC')
            ->findAll();

        $data['barangKeluarList'] = $this->barangKeluarModel
            ->select('barang_keluar.*, barang.kode_barang, barang.nama_barang')
            ->join('barang', 'barang.id = barang_keluar.barang_id', 'left')
            ->orderBy('barang_keluar.tanggal', 'DESC')
            ->findAll();

        return view('pages/laporan', $data);
    }

    public function exportExcel()
    {
        $barangMasukList = $this->barangMasukModel
            ->select('barang_masuk.*, barang.kode_barang, barang.nama_barang')
            ->join('barang', 'barang.id = barang_masuk.barang_id', 'left')
            ->orderBy('barang_masuk.tanggal', 'DESC')
            ->findAll();

        $barangKeluarList = $this->barangKeluarModel
            ->select('barang_keluar.*, barang.kode_barang, barang.nama_barang')
            ->join('barang', 'barang.id = barang_keluar.barang_id', 'left')
            ->orderBy('barang_keluar.tanggal', 'DESC')
            ->findAll();

        $spreadsheet = new Spreadsheet();

        // Sheet 1: Barang Masuk
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Barang Masuk');

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kode Barang');
        $sheet->setCellValue('C1', 'Nama Barang');
        $sheet->setCellValue('D1', 'Jumlah');
        $sheet->setCellValue('E1', 'Tanggal');
        $sheet->setCellValue('F1', 'Keterangan');

        $row = 2;
        foreach ($barangMasukList as $index => $bm) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $bm['kode_barang']);
            $sheet->setCellValue('C' . $row, $bm['nama_barang']);
            $sheet->setCellValue('D' . $row, $bm['jumlah']);
            $sheet->setCellValue('E' . $row, date('d-m-Y H:i', strtotime($bm['tanggal'])));
            $sheet->setCellValue('F' . $row, $bm['keterangan']);
            $row++;
        }

        // Sheet 2: Barang Keluar
        $spreadsheet->createSheet();
        $sheet2 = $spreadsheet->setActiveSheetIndex(1);
        $sheet2->setTitle('Barang Keluar');

        $sheet2->setCellValue('A1', 'No');
        $sheet2->setCellValue('B1', 'Kode Barang');
        $sheet2->setCellValue('C1', 'Nama Barang');
        $sheet2->setCellValue('D1', 'Jumlah');
        $sheet2->setCellValue('E1', 'Tanggal');
        $sheet2->setCellValue('F1', 'Keterangan');

        $row = 2;
        foreach ($barangKeluarList as $index => $bk) {
            $sheet2->setCellValue('A' . $row, $index + 1);
            $sheet2->setCellValue('B' . $row, $bk['kode_barang']);
            $sheet2->setCellValue('C' . $row, $bk['nama_barang']);
            $sheet2->setCellValue('D' . $row, $bk['jumlah']);
            $sheet2->setCellValue('E' . $row, date('d-m-Y H:i', strtotime($bk['tanggal'])));
            $sheet2->setCellValue('F' . $row, $bk['keterangan']);
            $row++;
        }

        $spreadsheet->setActiveSheetIndex(0);

        $filename = 'laporan_barang_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
