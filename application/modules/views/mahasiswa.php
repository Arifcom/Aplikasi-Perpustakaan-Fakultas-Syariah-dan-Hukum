<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <div class="row">
                    <div class="text-center">
                        <div class="form-group">
                            <a href="#"  data-toggle="modal" data-target="#import-mahasiswa" class="btn btn-default btn-fill btn-wd">Import Tabel Mahasiswa</a>
                            <a href="<?php echo BASE_URL; ?>mahasiswa/export" class="btn btn-default btn-fill btn-wd">Export Tabel Mahasiswa</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form  action="<?php echo BASE_URL; ?>mahasiswa/cari" method="post">
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-default btn-fill btn-wd">Cari</button>
                            </div>
                            <div class="col-md-10">
                                <input name="cari" type="text" class="form-control border-input">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="content table-responsive">
                <table class="table table-hover table-full-width">
                    <thead>
                    <th style="text-align: center;">Nomor</th>
                    <th style="text-align: center;">NIM</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Jurusan</th>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $kolom):
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $i++; ?></td>
                                <td style="text-align: center;"><?php echo $kolom->nim; ?></td>
                                <td style="text-align: left;"><?php echo $kolom->nama; ?></td>
                                <td style="text-align: center;"><?php echo $kolom->jurusan; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

