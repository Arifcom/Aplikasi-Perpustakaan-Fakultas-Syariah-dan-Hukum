<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="card">
            <div class="header text-center">
                <h4 class="title">Pengembalian Buku</h4>
                <p class="category">Form Pengembalian Buku</p>
            </div>
            <div class="content">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form  action="<?php echo BASE_URL; ?>pengembalian/tambah" method="post">
                        <?php
                        $i = 1;
                        foreach ($data as $kolom):
                        ?>
                            <div class="form-group">
                                <input type="text" name="kode_buku_satu" placeholder="Kode Buku 1" class="form-control border-input" disabled style="text-align: center;" value="<?php echo $kolom->kode_buku_1; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="kode_buku_dua" placeholder="Kode Buku 2" class="form-control border-input" disabled style="text-align: center;" value="<?php echo $kolom->kode_buku_2; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="kode_buku_tiga" placeholder="Kode Buku 3" class="form-control border-input" disabled style="text-align: center;" value="<?php echo $kolom->kode_buku_3; ?>">
                            </div>
                        <?php endforeach ?>
                        <div class="form-group text-center">
                            <input type="submit" name="pinjam" class="btn btn-default btn-fill btn-wd" value="Mengembalikan Buku">
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>  
        </div>
    </div>
    <div class="col-md-2"></div>