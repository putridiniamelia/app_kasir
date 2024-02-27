<?=$this->extend('layout/template'); ?>

<?=$this->section('content'); ?>    
          <!-- ========== form-elements-wrapper start ========== -->
        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                        <!-- input style start -->
                    <div class="card-style mb-30">
                        <h3 class="mb-25">Tambah Satuan</h3>
                            <!-- end input -->

                            <form method="POST" action="<?=site_url('simpan-satuan'); ?>">
                                
                            <label>Nama Satuan</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="nama_satuan" placeholder="Masukkan Nama Satuan!" autofocus/>
                                <?php if (session()->has('errors') && session('errors')->has('nama_satuan')): ?>
                                    <p class="text-danger">
                                        <?= esc(session('errors')->first('nama_satuan')) ?>
                                    </p>
                                <?php endif; ?>
                                <div class="invalid-feedback">Nama satuan tidak boleh kosong!</div>
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