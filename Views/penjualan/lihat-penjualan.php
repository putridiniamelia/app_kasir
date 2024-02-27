<?=$this->extend('layout/template'); ?>

<?=$this->section('content'); ?>

<head>
  <style>
    .form-elements-wrapper {
      margin:0 auto;
      width: 85%;
    }
    .select{
      width: 100%;
      padding: 0.5em;
      border: 1px solid #ccc;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<!-- // Basic multiple Column Form section start -->
<!-- ========== form-elements-wrapper start ========== -->
<div class="form-elements-wrapper">
<form id="lihat-penjualan" class="mt-4 needs-validation" method="POST" action="/lihat-penjualan/savePenjualan" novalidate>
<div class="card-style row my-5">
    <div class="col-md-4">
        <!-- No Faktur -->
        <label>No Faktur: <?=$nomorFaktur;?></label>
    </div>

    <div class="col-md-4">
        <!-- Tanggal -->
        <label>Tanggal: <?=date('Y-m-d H:i:s');?></label>
    </div>
    <div class="col-md-4">
        <!-- Kasir -->
        <label>Kasir: <?=session()->get('nama_user');?></label>
    </div>
</div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Input style for left side -->
            <!-- Nama Produk -->
            <div class="input-style-2">
              <!-- Nama Produk -->
              <h6 class="mb-25">Produk</h6>
              <input type="hidden" value=<?=$nomorFaktur;?> name="no_faktur" class="form-control"> 
              <div class="select">
                  <select class="js-example-basic-single form-select" name="kode_produk[]" id="nama_produk"> <!-- Perubahan di sini: ID diganti menjadi nama_produk -->
                      <option value="">Pilih Produk</option>
                      <?php foreach ($listProduk as $produk) : ?>  
                          <option value="<?= $produk->kode_produk ?>" data-harga="<?= $produk->harga_jual ?>">
                              <?= $produk->nama_produk ?> | <?=$produk->stok ?>
                          </option>
                      <?php endforeach; ?>
                  </select>
              </div>
          </div>
        </div>
        <div class="col-lg-6">
            <!-- Input style for right side -->
            <!-- Total -->
            <div class="input-style-2">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" width="20" placeholder="Berapa jumlahnya" required/>
                <div class="invalid-feedback">Harga Satuan tidak boleh kosong</div>
            </div>
            <!-- Harga -->
            <div class="input-style-2">
                <label>Harga</label>
                <input type="text" class="form-control" name="harga_jual" id="harga_jual" width="20" placeholder="Harga" readonly required/>
                <div class="invalid-feedback">Harga tidak boleh kosong</div>
            </div>
        </div>
    </div>
    <ul class="d-flex justify-content-end">
        <li class="d-inline-block">
            <button type="submit" class="main-btn primary-btn-light rounded-full btn-hover">
                <i class="lni lni-cart"></i> Simpan
            </button>
        </li>
        <li class="d-inline-block">
        <button type="button" class="main-btn success-btn-light rounded-full btn-hover" data-toggle="modal" data-target="#smallmodal" style="float:right;"  href="<?=site_url('form-bayar');?>"><i class="fa fa-plus-square" style="color: #ffffff;"></i> Tambah</button>
            <a type="button" class="main-btn success-btn-light rounded-full btn-hover" data-toggle="modal" data-target="#smallmodal" style="float:right;" 
            href="/lihat-penjualan/savePembayaran">
            <i class="lni lni-dollar"></i>Bayar</a>
        </li>
    </ul>
</form>
                  <br/>

                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead style="text-align: center;">
                        <tr>
                          <th>No</th>
                          <th>Nama Produk</th>
                          <th>Jumlah</th>
                          <th>Total</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if (isset($listDetailPenjualan) && !empty($listDetailPenjualan)) :
                              $no = 1; // Inisialisasi nomor urutan
                              foreach ($listDetailPenjualan as $detail) :
                                  $no++;
                          ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $detail->nama_produk ?></td>
                              <td><?= $detail->qty ?></td>
                              <td><?= number_format($detail['total_harga'], 0, ',', '.'); ?></td>
                              <td style="text-align: center;">
                                  <a href="<?= site_url('hapus-produk/' . $detail->id_detailpenjualan) ?>" OnClick="return confirm('Anda Yakin ?')" class="main-btn danger-btn-light rounded-full btn-hover">
                                      <i class="lni lni-trash-can"></i>
                                  </a>
                              </td>
                            </tr>
                            <?php
                              endforeach;
                            else: ?>
                            <tr>
                              <td colspan="4">Tidak ada produk</td>
                            </tr>
                            <?php
                          endif;
                          ?>
                      </tbody>
                    </table>

                    <div class="col">
                      <div class="card-style">
                        <div class="card-header">
                          <h3 class="card-title">TOTAL : RP <?=number_format($totalHarga, 0, ',', '.'); ?></h3>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="smallmodalLabel">Form Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" class="needs-validation" action="/form-bayar/savePembayaran" novalidate>
                        <div class="modal-body">
                            <h5 align="center">Total : <?= $totalHarga ?> </h5>
                        <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Bayar</label>
                        <div class="col-sm-13">
                            <input type="text" class="form-control uang" name="bayar" id="bayar" width="20"
                                placeholder="Masukkan nominal" required/>
                            <div class="invalid-feedback">Bayar tidak boleh kosong</div>
                        </div>
                        </div>
            
                        <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Kembali</label>
                        <div class="col-sm-13">
                            <input type="text" class="form-control uang" name="kembali" id="kembali" width="20"
                                placeholder="kembali"  required/>
                            <!-- <div class="invalid-feedback">Harga satua tidak boleh kosong</div> -->
                        </div>
                    </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>

                <!-- end card -->
                <!-- ======= input style end ======= -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script> 
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                <script>
                  // Menggunakan jQuery untuk menangani perubahan nilai dropdown
                  // Menggunakan jQuery untuk menangani perubahan nilai dropdown
                  $('#kode_produk').on('change', function() {
                      var harga_jual = $(this).find('option:selected').data('harga');
                      $('#harga_jual').val(harga_jual);
                  });
              </script>
              <script>
                    $(document).ready(function(){
                      $('.js-example-basic-single').select2();
                    });
                  </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Menggunakan jQuery untuk menangani perubahan nilai dropdown
                    $('#nama_produk').on('change', function() { // Perubahan di sini: Menggunakan nama_produk sebagai selector
                        var harga_jual = $(this).find('option:selected').data('harga');
                        $('#harga_jual').val(harga_jual);
                    });
                });

                $(document).ready(function(){
                    $('.js-example-basic-single').select2();
                });

                document.addEventListener('DOMContentLoaded', function() {
                    // Ambil elemen-elemen yang diperlukan
                    var bayar = document.getElementById('bayar');
                    var kembali = document.getElementById('kembali');
                    var totalHarga = <?= $totalHarga ?>;  // Ambil total harga dari controller dan diteruskan ke view

                    // Tambahkan event listener untuk memantau perubahan pada input bayar
                    bayar.addEventListener('input', function() {
                        // Ambil nilai yang dibayarkan dan konversi ke tipe data float
                        var bayarValue = parseFloat(bayar.value);

                        // Hitung kembaliannya
                        var kembalian = bayarValue - totalHarga;

                        // Tampilkan kembaliannya pada input kembali
                        if (kembalian >= 0) {
                            kembali.value = kembalian.toFixed(2).replace(/(\.00)+$/, ''); // Menampilkan hingga 2 digit desimal
                        } else {
                            kembali.value = '0'; // Jika kembalian negatif, tampilkan '0.00'
                        }
                    });
                });
            </script>


            </div>

<?=$this->endSection(); ?>
