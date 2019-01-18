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
                <h4 class="title">Peminjaman Buku</h4>
                <p class="category">Form Peminjaman Buku</p>
            </div>
            <div class="content">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form  action="<?php echo BASE_URL; ?>peminjaman/tambah" method="post">
                        <div class="form-group">
                            <input type="text" name="kode_buku_1" placeholder="Kode Buku 1" class="form-control border-input" autofocus style="text-align: center;">
                        </div>
                        <div class="form-group">
                            <input type="text" name="kode_buku_2" placeholder="Kode Buku 2" class="form-control border-input" style="text-align: center;">
                        </div>
                        <div class="form-group">
                            <input type="text" name="kode_buku_3" placeholder="Kode Buku 3" class="form-control border-input" style="text-align: center;">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="pinjam" class="btn btn-default btn-fill btn-wd" value="Meminjam Buku">
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>  
        </div>
    </div>
    <div class="col-md-2"></div>