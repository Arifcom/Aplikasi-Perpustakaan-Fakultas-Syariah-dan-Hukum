<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-md-12">
    <div class="row">
        <form  action="<?php echo BASE_URL; ?>pencarian/cari" method="post">
            <div class="form-group">
                <div class="text-center">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-default btn-fill btn-wd">Cari</button>
                </div>
                <div class="col-md-4">
                    <input name="cari" type="text" class="form-control border-input">
                </div>
                <div class="col-md-6">
                    
                </div>
                </div>
            </div>
        </form>
    </div>
    <div class="clearfix"></div><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Hasil Pencarian</h4>
                    <p class="category"><?php echo count($data); ?> hasil</p>
                </div>
                <div class="content">

                    <?php
                    foreach ($data as $kolom):
                    ?>
                        <div class="typo-line">
                            <p class="category">Rak xxx</p>
                            <blockquote>
                                <p>
                                    <?php echo $kolom->judul; ?>
                                </p>
                            </blockquote>
                        </div>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>