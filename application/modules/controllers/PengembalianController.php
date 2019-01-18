<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author WIN 10
 */

namespace application\modules\controllers;

use system\core\BaseController;
use application\modules\models\PengembalianModel;
use application\modules\models\DendaModel;

class PengembalianController extends BaseController {

    protected function Index() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "mahasiswa") {
                $query = PengembalianModel::tampildimana();
                $this->render_view("pengembalian", "umum", $query, "pengembalian");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Cari() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = PengembalianModel::cari();
                $this->render_view("monitor_pengembalian", "pegawai", $query, "pengembalian");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Monitor() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                $query = PengembalianModel::monitor();
                $this->render_view("monitor_pengembalian", "pegawai", $query, "pengembalian");
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Tambah() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "mahasiswa") {
                $nim = $_SESSION['username'];
                $connection = new \mysqli('localhost','root','','perpustakaan');
                $sql = "SELECT * FROM transaksi WHERE  nim = '$nim'";
                $result = $connection->query($sql);
                if($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if(date('Y-m-d') > date('Y-m-d', strtotime('+7 days', strtotime($row["tanggal"])))) {
                            $date_1 = date_create(date('Y-m-d'));
                            $date_2 = date_create(date('Y-m-d', strtotime('+7 days', strtotime($row["tanggal"]))));
                            $query = date_diff($date_1, $date_2, true);
                            $nim = $_SESSION['username'];
                            $jumlah_denda = $query->d * 300;
                            DendaModel::tambah($nim, $jumlah_denda);
                            $this->render_view("denda", "umum", $query->d * 300, "pengembalian");
                        } else {
                            PengembalianModel::tambah();
                            header('location: ' . BASE_URL);
                        }
                    }
                } else {

                }
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    protected function Export() {
        session_start();
        if(isset($_SESSION['hak_akses'])) {
            if($_SESSION['hak_akses'] == "pegawai") {
                PengembalianModel::export();
                header('location: ' . BASE_URL . 'pengembalian/monitor');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

}
