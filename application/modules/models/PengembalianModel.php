<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AkunModel
 *
 * @author WIN 10
 */

namespace application\modules\models;

use system\core\BaseModel;
require 'library/PHPExcel.php';
require 'library/PHPExcel/IOFactory.php';

class PengembalianModel extends BaseModel {
    
    public $nim;
    public $kode_buku_1;
    public $kode_buku_2;
    public $kode_buku_3;
    public $tanggal;
    public $waktu;

    public function __construct($nim, $kode_buku_1, $kode_buku_2, $kode_buku_3, $tanggal, $waktu ) {
        $this->nim = $nim;
        $this->kode_buku_1 = $kode_buku_1;
        $this->kode_buku_2 = $kode_buku_2;
        $this->kode_buku_3 = $kode_buku_3;
        $this->tanggal = $tanggal;
        $this->waktu = $waktu;
    }
    
    public static function cari() {
        $cari = $_POST['cari'];
        $query = self::db()->prepare("SELECT * FROM transaksi WHERE nim LIKE '%$cari%'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new PeminjamanModel($row["nim"], $row["kode_buku_1"], $row["kode_buku_2"], $row["kode_buku_3"], $row["tanggal"], $row["waktu"]));
        }
        return $result;
    }
    
    public static function TampilDimana() {
        $nim = $_SESSION['username'];
        $query = self::db()->prepare("SELECT * FROM transaksi WHERE nim = '$nim' AND transaksi='Peminjaman'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new PengembalianModel($row["nim"], $row["kode_buku_1"], $row["kode_buku_2"], $row["kode_buku_3"], $row["tanggal"], $row["waktu"]));
        }
        return $result;
    }
    
    public static function Monitor() {
        $query = self::db()->prepare("SELECT * FROM transaksi WHERE transaksi = 'Pengembalian'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new PengembalianModel($row["nim"], $row["kode_buku_1"], $row["kode_buku_2"], $row["kode_buku_3"], $row["tanggal"], $row["waktu"]));
        }
        return $result;
    }

    public static function Tambah() {
        $nim = $_SESSION['username'];
        $query = self::db()->prepare("SELECT * FROM transaksi WHERE nim = '$nim'");
        $query->execute();
        $row = $query->fetch();
        $nim = $_SESSION['username'];
        $query = self::db()->prepare("UPDATE transaksi SET transaksi = 'Pengembalian' WHERE nim = '$nim'");
        $query->execute();
        AkunModel::keluar();
    }
    
    public static function Export() {
        $file = new \PHPExcel ();
        $file->getProperties()->setCreator("Tim PPL 2017");
        $file->getProperties()->setLastModifiedBy("Tim PPL 2017");
        $file->createSheet(NULL, 0);
        $file->setActiveSheetIndex(0);
        $sheet = $file->getActiveSheet(0);
        $sheet->setTitle("Title");
        $file->getDefaultStyle()
                ->getAlignment()
                ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("A1", "Nomor")
                ->setCellValue("B1", "NIM")
                ->setCellValue("C1", "Kode Buku 1")
                ->setCellValue("D1", "Kode Buku 2")
                ->setCellValue("E1", "Kode Buku 3")
                ->setCellValue("F1", "Tanggal")
                ->setCellValue("G1", "Waktu");
        $query = self::db()->prepare("SELECT * FROM transaksi WHERE transaksi = 'Pengembalian'");
        $query->execute();
        $i = 2;
        $nomor = 1;
        while ($rowData = $query->fetch()) {
            $sheet->setCellValue("A" . $i, $nomor++)
                    ->setCellValue("B" . $i, $rowData["nim"])
                    ->setCellValue("C" . $i, $rowData["kode_buku_1"])
                    ->setCellValue("D" . $i, $rowData["kode_buku_2"])
                    ->setCellValue("E" . $i, $rowData["kode_buku_3"])
                    ->setCellValue("F" . $i, $rowData["tanggal"])
                    ->setCellValue("G" . $i, $rowData["waktu"]);
            $i++;
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Pengembalian Buku Perpustakaan.xls"');
        header('Cache-Control: max-age=0');
        $writer = \PHPExcel_IOFactory::createWriter($file, 'Excel5');
        $writer->save('php://output');
    }

}
