<?=$this->extend('layout/template'); ?>

<?=$this->section('content'); ?>
          <!-- ========== tables-wrapper start ========== -->
          <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="btn-tambah">
                  <a href="<?=site_url('/tambah-satuan'); ?>" class="main-btn primary-btn-light square-btn btn-hover btn-tambah">Tambah Satuan</a>
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
                  <h6 class="mb-30">Daftar Satuan</h6>

                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Satuan</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            if(isset($listSatuan)) :
                                $html = null;
                                $no = null;
                                foreach($listSatuan as $baris) :
                                  $no++;
                                  $html .='<tr>';
                                  $html .='<td>'. $no.'</td>';
                                  $html .='<td>'. $baris['nama_satuan'].'</td>';
                                  $html .='<td style="text-align: center;">
                                  <a href="'.site_url('/edit-satuan/'.$baris['id_satuan']).'"  class="main-btn warning-btn-light rounded-full btn-hover">
                                  <i class="lni lni-pencil-alt"></i>
                                  </a>
                                  <a href="'.site_url('/hapus-satuan/'.$baris['id_satuan']).'" OnClick="return confirm(\'Anda Yakin ?\')"  class="main-btn danger-btn-light rounded-full btn-hover">
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