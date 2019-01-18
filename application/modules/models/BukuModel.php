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
require 'library/PHPExcel/IOFactory.php';

class BukuModel extends BaseModel{
    
    public $kode;
    public $penulis;
    public $judul;
    public $penerbit;

    public function __construct($kode, $penulis, $judul, $penerbit) {
        $this->kode = $kode;
        $this->penulis = $penulis;
        $this->judul = $judul;
        $this->penerbit = $penerbit;
    }

    public static function tampil() {
        $query = self::db()->prepare("SELECT * FROM buku");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new BukuModel($row["kode"], $row["penulis"], $row["judul"], $row["penerbit"]));
        }
        return $result;
    }
    
    public static function cari() {
        $cari = $_POST['cari'];
        $query = self::db()->prepare("SELECT * FROM buku WHERE kode LIKE '%$cari%' OR penulis LIKE '%$cari%' OR judul LIKE '%$cari%' OR penerbit LIKE '%$cari%'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new BukuModel($row["kode"], $row["penulis"], $row["judul"], $row["penerbit"]));
        }
        return $result;
    }
    
    public static function import() {
        $file = $_FILES['file']['tmp_name'];
        $load = \PHPExcel_IOFactory::load($file);
        $sheet = $load->getSheet(0);
        $highest_row = $sheet->getHighestDataRow();
        $highest_column = $sheet->getHighestDataColumn();
        for ($row = 2; $row <= $highest_row; $row++) {
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highest_column . $row, NULL, TRUE, FALSE);
            $kode = $rowData[0][1];
            $penulis = $rowData[0][2];
            $judul = $rowData[0][3];
            $penerbit = $rowData[0][4];
            $query = self::db()->prepare("INSERT INTO buku (kode, penulis, judul, penerbit) VALUES ('$kode','$penulis','$judul', '$penerbit')");
            $query->execute();
        }
    }
    
    public static function export() {
        $file = new \PHPExcel ();
        $file->getProperties()->setCreator("Tim PPL 2017");
        $file->getProperties()->setLastModifiedBy("Tim PPL 2017");
        $file->createSheet(NULL, 0);
        $file->setActiveSheetIndex(0);
        $sheet = $file->getActiveSheet(0);
        $sheet->setTitle("Daftar Buku Perpustakaan");
        $file->getDefaultStyle()
                ->getAlignment()
                ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("A1", "Nomor")
                ->setCellValue("B1", "Kode")
                ->setCellValue("C1", "Penulis")
                ->setCellValue("D1", "Judul")
                ->setCellValue("E1", "Penerbit");
        $query = self::db()->prepare("SELECT * FROM buku");
        $query->execute();
        $i = 2;
        $nomor = 1;
        while ($rowData = $query->fetch()) {
            $sheet->setCellValue("A" . $i, $nomor++)
                    ->setCellValue("B" . $i, $rowData["kode"])
                    ->setCellValue("C" . $i, $rowData["penulis"])
                    ->setCellValue("D" . $i, $rowData["judul"])
                    ->setCellValue("E" . $i, $rowData["penerbit"]);
            $i++;
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Daftar Buku Perpustakaan.xls"');
        header('Cache-Control: max-age=0');
        $writer = \PHPExcel_IOFactory::createWriter($file, 'Excel5');
        $writer->save('php://output');
    }

}
