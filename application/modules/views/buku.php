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
                            <a href="#"  data-toggle="modal" data-target="#import-buku" class="btn btn-default btn-fill btn-wd">Import Tabel Buku</a>
                            <a href="<?php echo BASE_URL; ?>buku/export" class="btn btn-default btn-fill btn-wd">Export Tabel Buku</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form  action="<?php echo BASE_URL; ?>buku/cari" method="post">
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
                    <th style="text-align: center;">Kode</th>
                    <th style="text-align: center;">Penulis</th>
                    <th style="text-align: center;">Judul</th>
                    <th style="text-align: center;">Penerbit</th>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($data as $kolom):
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $i++; ?></td>
                                <td style="text-align: center;"><?php echo $kolom->kode; ?></td>
                                <td style="text-align: left;"><?php echo $kolom->penulis; ?></td>
                                <td style="text-align: left;"><?php echo $kolom->judul; ?></td>
                                <td style="text-align: left;"><?php echo $kolom->penerbit; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

