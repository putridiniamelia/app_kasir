<?=$this->extend('layout/template'); ?>

<?=$this->section('content'); ?>    
          <!-- ========== form-elements-wrapper start ========== -->
        <div class="form-elements-wrapper">
            <div class="row">
                <div class="col-lg-12">
                        <!-- input style start -->
                    <div class="card-style mb-30">
                        <h3 class="mb-25">Tambah Produk</h3>
                            <!-- end input -->

                            <form method="POST" action="<?php echo site_url('simpan-produk'); ?>">
                                
                            <label>Kode Produk</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="kode_produk" placeholder="Masukkan Kode Produk!" autofocus/>
                            </div>

                            <label>Nama Produk</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="nama_produk" placeholder="Masukkan Nama Produk!"/>
                            </div>

                            <label>Harga Beli</label>
                            <div class="input-style-3">
                                <input class="form-control money" type="text" name="harga_beli" data-mask="000.000.000.000.000" placeholder="Masukkan Harga Beli Produk!"/>
                            </div>

                            <label>Harga Jual</label>
                            <div class="input-style-3">
                                <input class="form-control money" type="text" name="harga_jual" data-mask="000.000.000.000.000"
                                placeholder="Masukkan Harga Jual Produk!" />
                            </div>

                            <!-- <label>Diskon</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="diskon" placeholder="Masukkan Diskon!" />
                            </div> -->

                            <div class="select-style-1">
                            <label>Nama Kategori</label>
                                <div class="select-position">
                            <select class="form-control"  name="id_kategori">
                                <option value="">Pilih kategori</option>
                            <?php
                            if(isset($listKategori)) :
                                foreach($listKategori as $baris) :
                                    if(isset($detailProduk[0]->kode_produk)) :
                                        $detailProduk[0]->id_kategori == $baris->id_kategori ? $pilih = 'selected' : $pilih=null; 
                                    else :
                                        $pilih=null;
                                    endif;
                                    echo '<option '.$pilih.' value="'.$baris->id_kategori.'">'.$baris->nama_kategori.'</option>';
                                endforeach; 
                            endif;
                            ?>
                            </select>
                            </div>
                            </div>

                            <label>Stok</label>
                            <div class="input-style-3">
                                <input class="form-control barang" type="number" name="stok" placeholder="Masukkan Stok Barang!"/>
                            </div>

                            <div class="select-style-1">
                            <label>Nama Satuan</label>
                                <div class="select-position">
                            <select class="form-control"  name="id_satuan">
                                <option value="">Pilih satuan</option>
                            <?php
                            if(isset($listSatuan)) :
                                foreach($listSatuan as $baris) :
                                    if(isset($detailProduk[0]->kode_produk)) :
                                        $detailProduk[0]['id_satuan'] == $baris['id_satuan'] ? $pilih = 'selected' : $pilih=null; 
                                    else :
                                        $pilih=null;
                                    endif;
                                    echo '<option '.$pilih.' value="'.$baris['id_satuan'].'">'.$baris['nama_satuan'].'</option>';
                                endforeach; 
                            endif;
                            ?>
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