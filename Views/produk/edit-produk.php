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

                            <form method="POST" action="<?=site_url('update-produk'); ?>">
                                
                            <!-- <label>Kode Produk</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="kode_produk" 
                                value="<?=$detailProduk[0]['kode_produk'];?>"
                                placeholder="Masukkan Kode Produk!" disabled/>
                            </div> -->

                            <label>Nama Produk</label>
                            <div class="input-style-3">
                            <input class="form-control" type="hidden" name="kode_produk"
                                value="<?=$detailProduk[0]['kode_produk'];?>"/>
                                <input class="form-control" type="text" name="nama_produk"
                                value="<?=$detailProduk[0]['nama_produk'];?>"
                                placeholder="Masukkan Nama Produk!" aurofocus/>
                            </div>

                            <label>Harga Beli</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="harga_beli" 
                                value="<?=$detailProduk[0]['harga_beli'];?>"
                                placeholder="Masukkan Harga Beli Produk!"/>
                            </div>

                            <label>Harga Jual</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="harga_jual"
                                value="<?=$detailProduk[0]['harga_jual'];?>"
                                placeholder="Masukkan Harga Jual Produk!" />
                            </div>

                            <!-- <label>Diskon</label>
                            <div class="input-style-3">
                                <input class="form-control" type="text" name="diskon" placeholder="Masukkan Diskon!" />
                            </div> -->

                            <div class="select-style-1">
                            <label>Nama Kategori</label>
                                <div class="select-position">
                            <select class="form-control" name="id_kategori">
                                <?php
                                    foreach($listKategori as $baris) :
                                        $pilih = isset($detailProduk[0]->id_kategori)&& $produk->id_kategori == $detailProduk[0]->id_kategori ? 'selected':'';
                                        echo '<option '.$pilih.' value="'.$baris->id_kategori.'">'.$baris->nama_kategori.'</option>';
                                    endforeach; 
                                ?>
                            </select>
                            </div>
                            </div>


                            <label>Stok</label>
                            <div class="input-style-3">
                                <input class="form-control" type="number" name="stok"
                                value="<?=$detailProduk[0]['stok'];?>"
                                placeholder="Masukkan Stok Barang!"/>
                            </div>

                            <div class="select-style-1">
                            <label>Nama Satuan</label>
                                <div class="select-position">
                            <select class="form-control" name="id_satuan">
                                <?php
                                    foreach($listSatuan as $baris) :
                                        $pilih = isset($detailProduk[0]['id_satuan'])&& $baris['id_satuan'] == $detailProduk[0]['id_satuan'] ? 'selected':'';
                                        echo '<option '.$pilih.' value="'.$baris['id_satuan'].'">'.$baris['nama_satuan'].'</option>';
                                    endforeach; 
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