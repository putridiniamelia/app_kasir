<?=$this->extend('layout/template'); ?>

<?=$this->section('content'); ?>    
          <!-- ========== form-elements-wrapper start ========== -->
        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                        <!-- input style start -->
                    <div class="card-style mb-30">
                        <h3 class="mb-25">Edit Kategori</h3>
                            <!-- end input -->

                            <form method="POST" action="<?=site_url('update-kategori');?>">
                                
                            <label>Nama Kategori</label>
                            <div class="input-style-3">
                            <input class="form-control" type="hidden" name="id_kategori"
                                value="<?=$detailKategori[0]['id_kategori'];?>"/>
                                <input class="form-control" type="text" name="nama_kategori" placeholder="Masukkan Nama Kategori!"
                                value="<?=$detailKategori[0]['nama_kategori'];?>"/>
                            </div>

                            <div>
                            <button class="main-btn primary-btn-light square-btn btn-hover" type="submit">Simpan</button>
                            </div>
                            <!-- end select -->
                            <!-- end input -->
                    </div>
                </div>
            </div>
        </div>
                <!-- end card -->
                <!-- ======= input style end ======= -->
<?=$this->endSection(); ?>