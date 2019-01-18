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
                    <div class="form-group">
                        <div class="col-md-2">
                            <a href="<?php echo BASE_URL; ?>perpanjangan/export" class="btn btn-default btn-fill btn-wd">Laporan</a>
                        </div>
                        <div class="col-md-10">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <form  action="<?php echo BASE_URL; ?>perpanjangan/cari" method="post">
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
                        <th style="text-align: center;">NIM</th>
                        <th style="text-align: center;">Kode Buku 1</th>
                        <th style="text-align: center;">Kode Buku 2</th>
                        <th style="text-align: center;">Kode Buku 3</th>
                        <th style="text-align: center;">Tanggal</th>
                        <th style="text-align: center;">Waktu</th>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php
                        foreach ($data as $kolom):
                        ?>
                            <tr>
                                <td><?php echo $kolom->nim; ?></td>
                                <td><?php echo $kolom->kode_buku_1; ?></td>
                                <td><?php echo $kolom->kode_buku_2; ?></td>
                                <td><?php echo $kolom->kode_buku_3; ?></td>
                                <td><?php echo $kolom->tanggal; ?></td>
                                <td><?php echo $kolom->waktu; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

