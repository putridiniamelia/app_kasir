<?=$this->extend('layout/template'); ?>

<?=$this->section('content'); ?>    
          <!-- ========== form-elements-wrapper start ========== -->
        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                        <!-- input style start -->
                    <div class="card-style mb-30">
                        <h3 class="mb-25">Tambah Pengguna</h3>
                            <!-- end input -->

                            <form method="POST" action="<?php echo site_url('simpan-user'); ?>">
                                
                            <label>Email</label>
                            <div class="input-style-3">
                                <input class="form-control" type="email" name="email"
                                 placeholder="Masukkan Email Anda!" autofocus />
                                <span class="icon"><i class="lni lni-envelope"></i></span>
                            </div>

                            <label>Nama Pengguna</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="nama_user" placeholder="Isi nama Anda di sini!" />
                                <span class="icon"><i class="lni lni-user"></i></span>
                            </div>

                            <label>Password</label>
                            <div class="input-style-3">
                                <input class="form-control" type="password" name="password" 
                                placeholder="Tentukan password Anda!" />
                                <span class="icon"><i class="lni lni-eye"></i></span>
                            </div>

                            <div class="select-style-1">
                            <label>Level</label>
                            <div class="select-position">
                                <select class="form-control" name="level">
                                    <option value="">Pilih Level</option>
                                    <?php
                                    if(isset($listUser)):
                                        foreach($listUser as $baris):
                                            $pilih = (isset($detailUser[0]->level) && $detailUser[0]->level == $baris->level) ? 'selected' : '';
                                            echo '<option '.$pilih.' value="'.$baris->level.'">'.$baris->level.'</option>';
                                        endforeach;
                                    endif;
                                    ?>
                                    <option <?= (isset($detailUser[0]->level) && $detailUser[0]->level == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                    <option <?= (isset($detailUser[0]->level) && $detailUser[0]->level == 'kasir') ? 'selected' : ''; ?>>Kasir</option>
                                </select>
                            </div>
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