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

class MahasiswaModel extends BaseModel{
    
    public $nim;
    public $nama;
    public $jurusan;

    public function __construct($nim, $nama, $jurusan) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->jurusan = $jurusan;
    }

    public static function tampil() {
        $query = self::db()->prepare("SELECT * FROM mahasiswa");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new MahasiswaModel($row["nim"], $row["nama"], $row["jurusan"]));
        }
        return $result;
    }
    
    public static function cari() {
        $cari = $_POST['cari'];
        $query = self::db()->prepare("SELECT * FROM mahasiswa WHERE nim LIKE '%$cari%' OR nama LIKE '%$cari%'");
        $query->execute();
        $result = array();
        while ($row = $query->fetch()) {
            array_push($result, new MahasiswaModel($row["nim"], $row["nama"], $row["jurusan"]));
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
            $username = $rowData[0][1];
            $password = md5($username);
            $query = self::db()->prepare("INSERT INTO akun (username, password, hak_akses) VALUES ('$username', '$password', 'mahasiswa')");
            $query->execute();
            $nim = $rowData[0][1];
            $nama = $rowData[0][2];
            $jurusan = $rowData[0][3];
            $query = self::db()->prepare("INSERT INTO mahasiswa (nim, nama, jurusan) VALUES ('$nim', '$nama', '$jurusan')");
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
        $sheet->setTitle("Daftar Anggota Perpustakaan");
        $file->getDefaultStyle()
                ->getAlignment()
                ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue("A1", "Nomor")
                ->setCellValue("B1", "NIM")
                ->setCellValue("C1", "Nama")
                ->setCellValue("D1", "Jurusan");
        $query = self::db()->prepare("SELECT * FROM mahasiswa");
        $query->execute();
        $i = 2;
        $nomor = 1;
        while ($rowData = $query->fetch()) {
            $sheet->setCellValue("A" . $i, $nomor++)
                    ->setCellValue("B" . $i, $rowData["nim"])
                    ->setCellValue("C" . $i, $rowData["nama"])
                    ->setCellValue("D" . $i, $rowData["jurusan"]);
            $i++;
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Daftar Anggota Perpustakaan.xls"');
        header('Cache-Control: max-age=0');
        $writer = \PHPExcel_IOFactory::createWriter($file, 'Excel5');
        $writer->save('php://output');
    }

}
