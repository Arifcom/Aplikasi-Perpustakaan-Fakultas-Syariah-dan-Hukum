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

class AkunModel extends BaseModel{

    public $username;
    public $password;

    public function __construct() {
        
    }

    public static function masuk() {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $query = self::db()->prepare("SELECT * FROM akun WHERE username = '$username'");
        $query->execute();
        $row = $query->fetch();
        if ($row['password'] == $password) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['hak_akses'] = $row['hak_akses'];
            if($_SESSION['hak_akses'] == "pegawai") {
                $username = $_SESSION['username'];
                $aktifitas = 'masuk';
                $query = self::db()->prepare("INSERT INTO log_aktifitas (username, aktifitas, tanggal, waktu) VALUES ('$username', '$aktifitas', CURDATE(), CURTIME())");
                $query->execute();
                header('location:  ' . BASE_URL . 'dashboard');
            } else if($_SESSION['hak_akses'] == "mahasiswa") {
                $username = $_SESSION['username'];
                $aktifitas = 'masuk';
                $query = self::db()->prepare("INSERT INTO log_aktifitas (username, aktifitas, tanggal, waktu) VALUES ('$username', '$aktifitas', CURDATE(), CURTIME())");
                $query->execute();
                header('location:  ' . BASE_URL . 'dashboard');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

    public static function masuk_peminjaman() {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $query = self::db()->prepare("SELECT * FROM akun WHERE username = '$username'");
        $query->execute();
        $row = $query->fetch();
        if ($row['password'] == $password) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['hak_akses'] = $row['hak_akses'];
            if($_SESSION['hak_akses'] == "mahasiswa") {
                $username = $_SESSION['username'];
                $aktifitas = 'masuk';
                $query = self::db()->prepare("INSERT INTO log_aktifitas (username, aktifitas, tanggal, waktu) VALUES ('$username', '$aktifitas', CURDATE(), CURTIME())");
                $query->execute();
                header('location:  ' . BASE_URL . 'peminjaman');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

    public static function masuk_pengembalian() {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $query = self::db()->prepare("SELECT * FROM akun WHERE username = '$username'");
        $query->execute();
        $row = $query->fetch();
        if ($row['password'] == $password) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['hak_akses'] = $row['hak_akses'];
            if($_SESSION['hak_akses'] == "mahasiswa") {
                $username = $_SESSION['username'];
                $aktifitas = 'masuk';
                $query = self::db()->prepare("INSERT INTO log_aktifitas (username, aktifitas, tanggal, waktu) VALUES ('$username', '$aktifitas', CURDATE(), CURTIME())");
                $query->execute();
                header('location:  ' . BASE_URL . 'pengembalian');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }

    public static function masuk_perpanjangan() {
        session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = md5($password);
        $query = self::db()->prepare("SELECT * FROM akun WHERE username = '$username'");
        $query->execute();
        $row = $query->fetch();
        if ($row['password'] == $password) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['hak_akses'] = $row['hak_akses'];
            if($_SESSION['hak_akses'] == "mahasiswa") {
                $username = $_SESSION['username'];
                $aktifitas = 'masuk';
                $query = self::db()->prepare("INSERT INTO log_aktifitas (username, aktifitas, tanggal, waktu) VALUES ('$username', '$aktifitas', CURDATE(), CURTIME())");
                $query->execute();
                header('location:  ' . BASE_URL . 'perpanjangan');
            }
        } else {
            header('location: ' . BASE_URL);
        }
    }
    
    public static function keluar() {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['hak_akses']);
        session_unset();
        session_destroy();
        header('location: ' . BASE_URL);
    }

}
