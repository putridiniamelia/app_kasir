<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?=base_url('assets/images/logo/logo3.png'); ?>" type="image/x-icon" />
    <title>Kasir Toko Sepatu</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/lineicons.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/css/materialdesignicons.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url('assets/css/main.css'); ?>" />
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css'); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
                      
      <!-- ========== signin-section start ========== -->
      <section class="signin-section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <!-- ========== title-wrapper end ========== -->

          <div class="row g-0 auth-row">
            <div class="col-lg-6">
              <div class="auth-cover-wrapper bg-primary-100">
                <div class="auth-cover">
                  <div class="title text-center">
                    <h1 class="text-primary mb-10">Welcome!</h1>
                    <p class="text-medium">
                      Sign in to your Existing account to continue
                    </p>
                  </div>
                  <div class="cover-image">
                    <img src="<?=base_url('assets/images/auth/signin-image.svg'); ?>" alt="" />
                  </div>
                  <div class="shape-image">
                    <img src="<?=base_url('assets/images/auth/shape.svg'); ?>" alt="" />
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="signin-wrapper">
                <div class="form-wrapper">
                  <h2 class="mb-50">Sign In Form</h2>

                  <form class= novalidate action="<?=site_url('index-login');?>" method="post">
                    <div class="row">
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

                      <!-- end col -->
                      <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                          <button class="main-btn primary-btn btn-hover w-100 text-center" type="submit">
                            Sign In
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- end row -->
                  </form>
                  <!-- <br/>
                    <p class="text-sm text-medium text-dark text-center">
                      Don’t have any account yet?
                      <a href="<?=site_url('signup');?>">Create an account</a>
                    </p> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
      </section>
      <!-- ========== signin-section end ========== -->
                    <!-- ========== footer start =========== -->
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