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
                            <a href="#" data-toggle="modal" data-target="#tambah-pegawai" class="btn btn-default btn-fill btn-wd">Tambah</a>
                        </div>
                        <div class="col-md-10">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <form  action="<?php echo BASE_URL; ?>pegawai/cari" method="post">
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
                    <tbody style="text-align: center;">
                        <?php
                        $i = 1;
                        foreach ($data as $kolom):
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $kolom->nip; ?></td>
                                <td><?php echo $kolom->nama; ?></td>
                                <td><?php echo $kolom->jabatan; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

