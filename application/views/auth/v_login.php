<!DOCTYPE html>
<html lang="en">

<!-- Header -->
<?php $this->load->view('header'); ?>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-1">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <?php $logo = (!empty($profile_class->logo)) ? $profile_class->logo : 'eclasse-logo.jpg'; ?>
              <img src="<?= base_url('images/class_logo/'.$logo); ?>" alt="logo" width="100" class="shadow-light rounded-circle class-img">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Eclasse</h4></div>

              <div class="card-body">
                <form method="POST" action="<?php echo base_url('auth/login_act'); ?>" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <!-- <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a> -->
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="text-danger mb-3 text-center">
                      <?php 
                        if($this->session->flashdata('error') <> '') {
                          echo $this->session->flashdata('error');
                        }
                      ?>    
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <?php $logo = (!empty($profile_class->name)) ? $profile_class->name : 'Eclasse'; ?>
                  <div class="text-job text-muted"><?= "Welcome to ".$logo;  ?></div>
                </div>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="<?= base_url('auth/register'); ?>">Create Account</a>
            </div>
            <div class="simple-footer">
              <?= footer(); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- JS Script -->
<?php $this->load->view('js-script'); ?>
</body>
</html>