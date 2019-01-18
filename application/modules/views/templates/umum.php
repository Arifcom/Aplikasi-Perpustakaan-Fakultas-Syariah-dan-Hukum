<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo BASE_URL . "application/public/images/title.png"; ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Perpustakaan</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="<?php echo BASE_URL; ?>application/public/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="<?php echo BASE_URL; ?>application/public/css/animate.min.css" rel="stylesheet"/>

        <!--  Paper Dashboard core CSS    -->
        <link href="<?php echo BASE_URL; ?>application/public/css/paper-dashboard.css" rel="stylesheet"/>
        
        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="<?php echo BASE_URL; ?>application/public/css/demo.css" rel="stylesheet" />

        <!--  Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="<?php echo BASE_URL; ?>application/public/css/themify-icons.css" rel="stylesheet">
        
        <!--  Internal css    -->
        <style>
            .pop-up-container {
                padding-top: 10px;
                padding-bottom: 30px;
                padding-left: 30px;
                padding-right: 30px;
                max-width: 350px;
                width: 100% !important;
                background-color: #F7F7F7;
                margin: 0 auto;
                border-radius: 6px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                overflow: hidden;
            }
            
            .pop-up-container h1 {
                text-align: center;
                font-size: 1.8em;
            }
            
            .pop-up-container input[type=submit] {
                height: 44px;
                width: 100%;
                display: block;
                margin-bottom: 10px;
                position: relative;
                padding: 0 8px;
            }

            .pop-up-container input[type=text], input[type=password] {
                height: 44px;
                text-align: center;
                font-size: 16px;
                width: 100%;
                margin-bottom: 10px;
                -webkit-appearance: none;
                background: #fff;
                border: 1px solid #d9d9d9;
                border-top: 1px solid #c0c0c0;
                /* border-radius: 2px; */
                padding: 0 8px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }
        </style>

    </head>
    <body>

        <div class="wrapper">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Perpustakaan</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="<?php echo BASE_URL; ?>">
                                        <i class="ti-home"></i>
                                        <p>Beranda</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL; ?>tentang">
                                        <i class="ti-info"></i>
                                        <p>Tentang</p>
                                    </a>
                                </li>
                                <li>
                                    <?php
                                        if(isset($_SESSION['username'])) {
                                    ?>
                                        <a href="<?php echo BASE_URL; ?>otentikasi/keluar">
                                            <i class="ti-arrow-left"></i>
                                            <p>Keluar(<?php echo $_SESSION['username']; ?>)</p>
                                        </a>
                                    <?php
                                        } else {
                                    ?>
                                        <a href="#" data-toggle="modal" data-target="#masuk">
                                            <i class="ti-arrow-right"></i>
                                            <p>Masuk</p>
                                        </a>
                                    <?php
                                        }
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                        
                        <?php require($content); ?>
                        
                    </div>
                </div>

        </div>


    </body>
    
    <!-- Extras -->
    <div class="modal fade" id="masuk" role="dialog">
        <div class="modal-dialog">
            <div class="pop-up-container">
                <h1>Masuk ke Akun Anda</h1><br>
                <form  action="<?php echo BASE_URL; ?>otentikasi/masuk" method="post">
                    <input type="text" name="username" placeholder="username" class="form-control border-input" autofocus>
                    <input type="password" name="password" placeholder="password" class="form-control border-input">
                    <input type="submit" name="masuk" class="btn btn-default btn-fill btn-wd" value="Masuk">
                </form>
            </div>
        </div>
    </div>
    
    <!-- Extras -->
    <div class="modal fade" id="peminjaman" role="dialog">
        <div class="modal-dialog">
            <div class="pop-up-container">
                <h1>Masuk ke Akun Anda</h1><br>
                <form  action="<?php echo BASE_URL; ?>otentikasi/masukpeminjaman" method="post">
                    <input type="text" name="username" placeholder="username" class="form-control border-input" autofocus>
                    <input type="password" name="password" placeholder="password" class="form-control border-input">
                    <input type="submit" name="masuk" class="btn btn-default btn-fill btn-wd" value="Masuk">
                </form>
            </div>
        </div>
    </div>
    
    <!-- Extras -->
    <div class="modal fade" id="pengembalian" role="dialog">
        <div class="modal-dialog">
            <div class="pop-up-container">
                <h1>Masuk ke Akun Anda</h1><br>
                <form  action="<?php echo BASE_URL; ?>otentikasi/masukpengembalian" method="post">
                    <input type="text" name="username" placeholder="username" class="form-control border-input" autofocus>
                    <input type="password" name="password" placeholder="password" class="form-control border-input">
                    <input type="submit" name="masuk" class="btn btn-default btn-fill btn-wd" value="Masuk">
                </form>
            </div>
        </div>
    </div>
    
    <!-- Extras -->
    <div class="modal fade" id="perpanjangan" role="dialog">
        <div class="modal-dialog">
            <div class="pop-up-container">
                <h1>Masuk ke Akun Anda</h1><br>
                <form  action="<?php echo BASE_URL; ?>otentikasi/masukperpanjangan" method="post">
                    <input type="text" name="username" placeholder="username" class="form-control border-input" autofocus>
                    <input type="password" name="password" placeholder="password" class="form-control border-input">
                    <input type="submit" name="masuk" class="btn btn-default btn-fill btn-wd" value="Masuk">
                </form>
            </div>
        </div>
    </div>
    
    <!-- Extras -->
    <div class="modal fade" id="pencarian" role="dialog">
        <div class="modal-dialog">
            <div class="text-center">
                <h1 style="color: black;">Cari Buku</h1>
            </div>
            <form  action="<?php echo BASE_URL; ?>pencarian/cari" method="post">
                <input type="text" name="cari" placeholder="Judul Buku" style="text-align: center;" class="form-control border-input" autofocus>
            </form>
        </div>
    </div>

    <!-- Extras -->
    <div class="modal fade" id="tambah-buku-tamu" role="dialog">
        <div class="modal-dialog">
            <div class="pop-up-container">
                <h1>Isi Buku Tamu</h1><br>
                <form  action="<?php echo BASE_URL; ?>bukutamu/tambah" method="post">
                    <input type="text" name="nim" placeholder="NIM" class="form-control border-input" autofocus>
                    <input type="text" name="nama" placeholder="Nama" class="form-control border-input">
                    <input type="text" name="keterangan" placeholder="Keterangan" class="form-control border-input">
                    <input type="submit" name="tambah" class="btn btn-default btn-fill btn-wd" value="Tambah">
                </form>
            </div>
        </div>
    </div>
    
    <!--   Core JS Files   -->
    <script src="<?php echo BASE_URL; ?>application/public/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL; ?>application/public/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="<?php echo BASE_URL; ?>application/public/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo BASE_URL; ?>application/public/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="<?php echo BASE_URL; ?>application/public/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?php echo BASE_URL; ?>application/public/js/demo.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            demo.initChartist();

            $.notify({
                message: "<p align='center'>Selamat Datang di Perpustakaan <br> Fakultas Syariah dan Hukum</p>"
            }, {
                type: 'success',
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'center'
                }
            });

        });
    </script>

</html>
