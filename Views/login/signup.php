
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign Up | Shoes Store</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/lineicons.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/materialdesignicons.min.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/main.css'); ?>" />
    <style>
      body {
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column;
      }
    </style>
  </head>
  <body>
            <div class="col-lg-6 signup">
              <div class="signup-wrapper">
                <div class="form-wrapper">
                  <h6 class="mb-30">Sign Up Form</h6>
                  <form action="post" action="<?=site_url('dashboard');?>">
                    <div class="row">
                      <div class="col-20">
                        <div class="input-style-1">
                          <label>Nama</label>
                          <input type="text" name="nama_user" placeholder="Name" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Email</label>
                          <input type="email" name="email" placeholder="Email" />
                        </div>
                      </div>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="input-style-1">
                          <label>Password</label>
                          <input type="password" name="password" placeholder="Password" />
                        </div>
                      </div>
                      <!-- end col -->
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
                      <br/>
                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center">
                            Sign Up
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      <!-- ========== signin-section end ========== -->

      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
