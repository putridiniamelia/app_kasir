<?=$this->extend('layout/template'); ?>

<?=$this->section('content'); ?>
          <!-- ========== tables-wrapper start ========== -->
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="btn-tambah">
                  <a href="<?=site_url('/tambah-produk'); ?>" class="main-btn primary-btn-light square-btn btn-hover btn-tambah">Tambah Produk</a>
                  </div>
                  <br/>
                  <?php if(session()->has('hapus')): ?>
                    <div class="alert alert-danger" role="alert">
                      <?= session('hapus') ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->has('simpan')): ?>
                    <div class="alert alert-success" role="alert">
                      <?=session('simpan') ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->has('edit')): ?>
                    <div class="alert alert-warning" role="alert">
                      <?=session('edit') ?>
                    </div>
                <?php endif; ?>

                <?php if(session()->has('gagal')): ?>
                    <div class="alert alert-danger" role="alert">
                      <?=session('gagal') ?>
                    </div>
                <?php endif; ?>

                  <h6 class="mb-30">Daftar Produk</h6>
                  <div class="text-start">
                    <div class="col-sm-2">
                      <form method="POST" > 
                    </div>
                    <br/>
                    
                      </form>

                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No</th>
                          <th>Kode Produk</th>
                          <th>Nama Produk</th>
                          <th>Harga Beli</th>
                          <th>Harga Jual</th>
                          <th>Nama Kategori</th>
                          <th>Stok</th>
                          <th>Nama Satuan</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if (isset($listProduk)) :
                              $no = 0; // Inisialisasi nomor urutan
                              foreach ($listProduk as $baris) :
                                  $no++;
                          ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $baris->kode_produk ?></td>
                              <td><?= $baris->nama_produk ?></td>
                              <td><?= $baris->harga_beli ?></td>
                              <td><?= $baris->harga_jual ?></td>
                              <td><?= $baris->nama_kategori ?></td>
                              <td><?= $baris->stok ?></td>
                              <td><?= $baris->nama_satuan ?></td>
                              <td style="text-align: center;">
                                  <a href="<?= site_url('edit-produk/' . $baris->kode_produk) ?>" class="main-btn warning-btn-light rounded-full btn-hover">
                                      <i class="lni lni-pencil-alt"></i>
                                  </a>
                                  <a href="<?= site_url('hapus-produk/' . $baris->kode_produk) ?>" OnClick="return confirm('Anda Yakin ?')" class="main-btn danger-btn-light rounded-full btn-hover">
                                      <i class="lni lni-trash-can"></i>
                                  </a>
                              </td>
                          </tr>
                          <?php
                              endforeach;
                          endif;
                          ?>

                          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                          <script src="<?=base_url('assets/js/dist/jquery.mask.js');?>"></script>
                          <script>
                              $(document).ready(function(){
                                  $('.money').mask('000.000.000.000.000', {reverse: true});
                                  $('.barang').mask('000.000', {reverse: true});
                              })
                          </script>

                        </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->

<?=$this->endSection(); ?>