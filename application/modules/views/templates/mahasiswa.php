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

    </head>
    <body>

        <div class="wrapper">

            <div class="sidebar" data-background-color="white" data-active-color="danger">

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="#" class="simple-text">
                            Perpustakaan
                        </a>
                    </div>

                    <ul class="nav">
                        <li <?php if ($active == "dashboard") { echo "class='active'"; }?>>
                            <a href="<?php echo BASE_URL; ?>dashboard">
                                <i class="ti-desktop"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>                          
                    </ul>
                </div>
            </div>

            <div class="main-panel">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="ti-bell"></i>
                                        <p class="notification"></p>
                                        <p>Notifications</p>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $username = $_SESSION['username'];
                                        $connection = new PDO("mysql:host=localhost;dbname=database", "root", "");
                                        $query = $connection->prepare("SELECT * FROM log_aktifitas WHERE username = '$username' LIMIT 5");
                                        $query->execute();
                                        while ($rowData = $query->fetch()) {
                                            echo '<li><a href="#">Anda berhasil ' . $rowData["aktifitas"] . ' pada ' . $rowData["tanggal"] . ' ' . $rowData["waktu"] . '</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo BASE_URL; ?>otentikasi/keluar">
                                        <i class="ti-arrow-left"></i>
                                        <p>Keluar</p>
                                    </a>
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

                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        Perpustakaan Fakultas Syariah dan Hukum
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright pull-right">
                            &copy; <script>document.write(new Date().getFullYear())</script>, oleh PPL <script>document.write(new Date().getFullYear())</script></a>
                        </div>
                    </div>
                </footer>

            </div>

        </div>


    </body>

    <!-- Extras -->
    <div id="import-mahasiswa" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form action="<?php echo BASE_URL; ?>mahasiswa/import" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="text-center">
                            <h4 class="modal-title">Import Mahasiswa</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <input type="file" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-default btn-fill btn-wd">Import</button>
                            <button type="button" class="btn btn-default btn-fill btn-wd" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Extras -->
    <div id="import-buku" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form action="<?php echo BASE_URL; ?>buku/import" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <div class="text-center">
                            <h4 class="modal-title">Import Buku</h4>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <input type="file" name="file">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-default btn-fill btn-wd">Import</button>
                            <button type="button" class="btn btn-default btn-fill btn-wd" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
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

<?php
$connection = new mysqli('localhost','root','','database');
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-01-01' AND LAST_DAY('2017-01-01'))";
$result_peminjaman_1 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-02-01' AND LAST_DAY('2017-02-01'))";
$result_peminjaman_2 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-03-01' AND LAST_DAY('2017-03-01'))";
$result_peminjaman_3 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-04-01' AND LAST_DAY('2017-04-01'))";
$result_peminjaman_4 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-05-01' AND LAST_DAY('2017-05-01'))";
$result_peminjaman_5 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-06-01' AND LAST_DAY('2017-06-01'))";
$result_peminjaman_6 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-07-01' AND LAST_DAY('2017-07-01'))";
$result_peminjaman_7 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-08-01' AND LAST_DAY('2017-08-01'))";
$result_peminjaman_8 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-09-01' AND LAST_DAY('2017-09-01'))";
$result_peminjaman_9 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-10-01' AND LAST_DAY('2017-10-01'))";
$result_peminjaman_10 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-11-01' AND LAST_DAY('2017-11-01'))";
$result_peminjaman_11 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Peminjaman' AND (tanggal BETWEEN '2017-12-01' AND LAST_DAY('2017-12-01'))";
$result_peminjaman_12 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-01-01' AND LAST_DAY('2017-01-01'))";
$result_pengembalian_1 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-02-01' AND LAST_DAY('2017-02-01'))";
$result_pengembalian_2 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-03-01' AND LAST_DAY('2017-03-01'))";
$result_pengembalian_3 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-04-01' AND LAST_DAY('2017-04-01'))";
$result_pengembalian_4 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-05-01' AND LAST_DAY('2017-05-01'))";
$result_pengembalian_5 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-06-01' AND LAST_DAY('2017-06-01'))";
$result_pengembalian_6 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-07-01' AND LAST_DAY('2017-07-01'))";
$result_pengembalian_7 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-08-01' AND LAST_DAY('2017-08-01'))";
$result_pengembalian_8 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-09-01' AND LAST_DAY('2017-09-01'))";
$result_pengembalian_9 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-10-01' AND LAST_DAY('2017-10-01'))";
$result_pengembalian_10 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-11-01' AND LAST_DAY('2017-11-01'))";
$result_pengembalian_11 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Pengembalian' AND (tanggal BETWEEN '2017-12-01' AND LAST_DAY('2017-12-01'))";
$result_pengembalian_12 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-01-01' AND LAST_DAY('2017-01-01'))";
$result_perpanjangan_1 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-02-01' AND LAST_DAY('2017-02-01'))";
$result_perpanjangan_2 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-03-01' AND LAST_DAY('2017-03-01'))";
$result_perpanjangan_3 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-04-01' AND LAST_DAY('2017-04-01'))";
$result_perpanjangan_4 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-05-01' AND LAST_DAY('2017-05-01'))";
$result_perpanjangan_5 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-06-01' AND LAST_DAY('2017-06-01'))";
$result_perpanjangan_6 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-07-01' AND LAST_DAY('2017-07-01'))";
$result_perpanjangan_7 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-08-01' AND LAST_DAY('2017-08-01'))";
$result_perpanjangan_8 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-09-01' AND LAST_DAY('2017-09-01'))";
$result_perpanjangan_9 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-10-01' AND LAST_DAY('2017-10-01'))";
$result_perpanjangan_10 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-11-01' AND LAST_DAY('2017-11-01'))";
$result_perpanjangan_11 = $connection->query($sql);
$sql = "SELECT * FROM transaksi WHERE transaksi = 'Perpanjangan' AND (tanggal BETWEEN '2017-12-01' AND LAST_DAY('2017-12-01'))";
$result_perpanjangan_12 = $connection->query($sql);
if ($active == "dashboard") {
    ?>
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

            var data = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                series: [
                    [<?php  echo $result_peminjaman_1->num_rows?>, <?php  echo $result_peminjaman_2->num_rows?>, <?php  echo $result_peminjaman_3->num_rows?>, <?php  echo $result_peminjaman_4->num_rows?>, <?php  echo $result_peminjaman_5->num_rows?>, <?php  echo $result_peminjaman_6->num_rows?>, <?php  echo $result_peminjaman_7->num_rows?>, <?php  echo $result_peminjaman_8->num_rows?>, <?php  echo $result_peminjaman_9->num_rows?>, <?php  echo $result_peminjaman_10->num_rows?>, <?php  echo $result_peminjaman_11->num_rows?>, <?php  echo $result_peminjaman_12->num_rows?>],
                    [<?php  echo $result_pengembalian_1->num_rows?>, <?php  echo $result_pengembalian_2->num_rows?>, <?php  echo $result_pengembalian_3->num_rows?>, <?php  echo $result_pengembalian_4->num_rows?>, <?php  echo $result_pengembalian_5->num_rows?>, <?php  echo $result_pengembalian_6->num_rows?>, <?php  echo $result_pengembalian_7->num_rows?>, <?php  echo $result_pengembalian_8->num_rows?>, <?php  echo $result_pengembalian_9->num_rows?>, <?php  echo $result_pengembalian_10->num_rows?>, <?php  echo $result_pengembalian_11->num_rows?>, <?php  echo $result_pengembalian_12->num_rows?>],
                    [<?php  echo $result_perpanjangan_1->num_rows?>, <?php  echo $result_perpanjangan_2->num_rows?>, <?php  echo $result_perpanjangan_3->num_rows?>, <?php  echo $result_perpanjangan_4->num_rows?>, <?php  echo $result_perpanjangan_5->num_rows?>, <?php  echo $result_perpanjangan_6->num_rows?>, <?php  echo $result_perpanjangan_7->num_rows?>, <?php  echo $result_perpanjangan_8->num_rows?>, <?php  echo $result_perpanjangan_9->num_rows?>, <?php  echo $result_perpanjangan_10->num_rows?>, <?php  echo $result_perpanjangan_11->num_rows?>, <?php  echo $result_perpanjangan_12->num_rows?>]
                ]
            };

            var options = {
                seriesBarDistance: 10,
                axisX: {
                    showGrid: false
                },
                height: "245px"
            };

            var responsiveOptions = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function (value) {
                            return value[0];
                        }
                    }
                }]
            ];

            Chartist.Line('.ct-chart', data, options, responsiveOptions);
        </script>
    <?php
}
?>

</html>
