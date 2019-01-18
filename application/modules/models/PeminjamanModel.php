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

class PeminjamanModel extends BaseModel {
    
    public $nim;
    public $kode_buku_1;
    public $kode_buku_2;
    public $kode_buku_3;
    public $tangal;
    public $waktu;
    
    public function __construct($nim, $kode_buku_1, $kode_buku_2, $kode_buku_3, $tangal, $waktu) {
        $this->nim = $nim;
        $this->kode_buku_1 = $kode_buku_1;
        $this->kode_buku_2 = $kode_buku_2;
        $this->kode_buku_3 = $kode_buku_3;
        $this->tanggal = $tangal;
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
    
    public static function Monitor() {
        $query = self::db()->prepare("SELECT * FROM transaksi WHERE transaksi = 'Peminjaman'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new PeminjamanModel($row["nim"], $row["kode_buku_1"], $row["kode_buku_2"], $row["kode_buku_3"], $row["tanggal"], $row["waktu"]));
        }
        return $result;
    }

    public static function Tambah() {
        $nim = $_SESSION['username'];
        $kode_buku_1 = $_POST['kode_buku_1'];
        $kode_buku_2 = $_POST['kode_buku_2'];
        $kode_buku_3 = $_POST['kode_buku_3'];
        $query = self::db()->prepare("INSERT INTO transaksi (nim, transaksi, kode_buku_1, kode_buku_2, kode_buku_3, tanggal, waktu) VALUES ('$nim', 'Peminjaman', '$kode_buku_1', '$kode_buku_2', '$kode_buku_3', CURDATE(), CURTIME())");
        $query->execute();
        AkunModel::keluar();
    }
    
    public static function export() {
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
        $query = self::db()->prepare("SELECT * FROM transaksi WHERE transaksi = 'Peminjaman'");
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
        header('Content-Disposition: attachment;filename="Laporan Peminjaman Buku Perpustakaan.xls"');
        header('Cache-Control: max-age=0');
        $writer = \PHPExcel_IOFactory::createWriter($file, 'Excel5');
        $writer->save('php://output');
    }

}
