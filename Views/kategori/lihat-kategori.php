<?=$this->extend('layout/template'); ?>

<?=$this->section('content'); ?>
          <!-- ========== tables-wrapper start ========== -->
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="btn-tambah">
                  <a href="<?=site_url('/tambah-kategori'); ?>" class="main-btn primary-btn-light square-btn btn-hover btn-tambah">Tambah Kategori</a>
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

                  <h6 class="mb-30">Daftar Kategori</h6>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kategori</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if(isset($listKategori)) :
                                $html = null;
                                $no = null;
                                foreach($listKategori as $baris) :
                                  $no++;
                                  $html .='<tr>';
                                  $html .='<td>'. $no.'</td>';
                                  $html .='<td>'. $baris->nama_kategori.'</td>';
                                  $html .='<td style="text-align: center;">
                                  <a href="'.site_url('/edit-kategori/'.$baris->id_kategori).'"  class="main-btn warning-btn-light rounded-full btn-hover">
                                  <i class="lni lni-pencil-alt"></i>
                                  </a>
                                  <a href="'.site_url('/hapus-kategori/'.$baris->id_kategori).'" OnClick="return confirm(\'Anda Yakin ?\')"  class="main-btn danger-btn-light rounded-full btn-hover">
                                  <i class="lni lni-trash-can"></i>
                                  </a>
                                  </td>';
                                  $html .='</tr>';
                                endforeach;    
                            endif;
                            echo $html;
                        ?>
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